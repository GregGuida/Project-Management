#!/usr/bin/env python

# Path to MySQL:
# /Applications/XAMPP/xamppfiles/bin/mysql
import sys, json, argparse, subprocess
         
def main():
	#Instantiate an arguments Parser
	p = argparse.ArgumentParser(description='Generates and/or Executes SQL commands for fixtures stored in a JSON file.')
	p.add_argument('--file', '-f', default="./fixtures.json", help="sets the path to the fixture data you want to convert. Default is ./fixtures.json")
	p.add_argument('--generate_file', '-g', default='./fix_gen.sql', help='sets the file to save the SQL for the fixtures. Default is ./fix_gen.sql')
	p.add_argument('--execute_sql', '-x', action='store_true', default=False, help='Execute the generated SQL on the database.')
	p.add_argument('--execute_only', '-r', action='store_true', default=False, help='Execute the generated SQL on the database without saving the SQL commands to a file.')
	arguments = p.parse_args()
	
	if arguments.execute_sql or arguments.execute_only:
		mysql_path = raw_input("Please enter the absolute path to mysql command [/usr/local/mysql/bin/mysql]: ") or "/usr/local/mysql/bin/mysql"
		mysql_user = raw_input("Please enter the mysql user name [root]: ") or "root"
		mysql_password = raw_input("Please enter the mysql user password []: ") or "" 
		mysql_database = raw_input("Please enter the mysql database name [fmdb]: ") or "fmdb"
	
	# Read the file provided; if none provided, try using the default
	print 'Using JSON File Path: "{0}"'.format(arguments.file)
	generate_sql(arguments.file, arguments.generate_file)
	
	if arguments.execute_sql:
		execute_sql(arguments.generate_file, mysql_path, mysql_user, mysql_password, mysql_database)
	elif arguments.execute_only:
		# If the user only wants to execute the SQL, remove the file that was used for execution after it has run
		execute_sql(arguments.generate_file, mysql_path, mysql_user, mysql_password, mysql_database)
		remove_sql_file(arguments.generate_file)
	print 'Fixture Creation{0} Successful :)'.format(" and Execution" if arguments.execute_sql or arguments.execute_only else '')	
	sys.exit(True)


def generate_sql(json_loc, save_loc):
	print 'Reading JSON from "{0}"'.format(json_loc)
	# ...Read the JSON
	try:
		inputFile = open(json_loc)
		input = json.load(inputFile)
		inputFile.close()
	except IndexError:
		print "Something went wrong..."
		sys.exit(False)
	except IOError:
		print "The file '{0}' doesn't exist. Please enter the correct path to the file.".format(json_loc)
		sys.exit(False)
		
	print 'Generating the SQL'
	# ...Generate the SQL
	sql_statements = []
	# This is such a dirty way of doing this...but i don't know of any other way that doesn't require numpy
	for table in input:
		for row in input[table]:
			keys = map(lambda key: "`%s`" % key, row.keys())
			values = map(lambda value: "'%s'" % value, row.values())
			sql_statements.append('INSERT INTO `{0}` ({1}) values ({2});'.format(table, ", ".join(keys), ", ".join(values)))
				
	print 'Saving Generated SQL to "{}"'.format(save_loc)
	# ...Save the SQL
	output = open(save_loc, "w")
	output.write("\n".join(sql_statements))
	output.close()
	
def execute_sql(sql_file, mysql_path, mysql_user, mysql_password, mysql_database):
	print 'Executing SQL from generated file at "{0}"'.format(sql_file)
	#runs 'mysql -h localhost -u <username> -p <password> -D <database> --verbose < <sql_file>'
	statement_return = run_bash("""{0} -h localhost -u {1}{2} -D {3} --verbose < {4}""".format(mysql_path, mysql_user, " -p " + mysql_password if mysql_password else '', mysql_database, sql_file))
	print statement_return
		
def remove_sql_file(sql_file):
	# This is probably really dangerous, but whatever...
	print 'Removing the file used to execute the SQL'
	run_bash("""rm -f """ + sql_file)
	
def run_bash(cmd):
	bash = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
	output = bash.stdout.read().strip()
	return output

# Execute this only if from the command line
# Pass in the values specified	
if __name__ == "__main__":
	main()