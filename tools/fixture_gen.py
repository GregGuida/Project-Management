#!/usr/bin/env python

import sys, json, optparse
         
def main():
	#Instantiate an Options Parser
	p = optparse.OptionParser()
	p.add_option('--file', '-f', default="./fixtures.json", help="sets the path to the fixture data you want to convert. Default is ./fixtures.json")
	p.add_option('--generate_file', '-g', default='./fix_gen.sql', help='sets the file to save the SQL for the fixtures. Default is ./fix_gen.sql')
	p.add_option('--execute_sql', '-x', action='store_true', default=False, help='Execute the generated SQL on the database.')
	p.add_option('--execute_only', '-r', action='store_true', default=False, help='Execute the generated SQL on the database without saving the SQL commands to a file.')
	options, arguments = p.parse_args()
	
	# Read the file provided; if none provided, try using the default
	print 'Using JSON File Path: "%s"' % options.file
	generate_sql(options.file, options.generate_file)
	
	if options.execute_sql:
		execute_sql(options.generate_file)
	elif options.execute_only:
		# If the user only wants to execute the SQL, remove the file that was used for execution after it has run
		execute_sql(options.generate_file)
		remove_sql_file(options.generate_file)
	#print 'Fixture Creation and Execution Successful :)'	
	sys.exit(True)


def generate_sql(json_loc, save_loc):
	print 'Reading JSON from "%s"' % json_loc
	# ...Read the JSON
	try:
		inputFile = open(json_loc)
		input = json.load(inputFile)
		inputFile.close()
	except IndexError:
		print "Something went wrong..."
		sys.exit(False)
	except IOError:
		print "The file '%s' doesn't exist. Please enter the correct path to the file." % json_loc
		sys.exit(False)
	print 'Generating the SQL'
	# ...Generate the SQL
	# This is such a dirty way of doing this...but i don't know of any other way that doesn't require numpy
	for table in input:
		for row in input[table]:
			keys = []
			values = []
			for key in row:
				keys.append("`%s`" % key)
				values.append("'%s'" % row[key])
			print 'INSERT INTO `%s` (%s) values (%s);' % (table, ", ".join(keys), ", ".join(values)) 
				
	#print 'Saving Generated SQL to "%s"' % save_loc
	# ...Save the SQL
	
def execute_sql(sql_file):
	print 'Executing SQL from generated file at "%s"' % sql_file

		
def remove_sql_file(sql_file):
	# This is probably really dangerous, but whatever...
	print 'Removing the file used to execute the SQL'

# Execute this only if from the command line
# Pass in the values specified	
if __name__ == "__main__":
	main()