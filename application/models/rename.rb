#!/usr/bin/ruby

Dir.foreach('.') do |d|
  if File.exists?(d) and d != '.' and d != '..'
    #File.rename("#{d}", "#{d}what")
    File.rename("#{d}", "#{d}".sub(/what/, ''))
  end
end
