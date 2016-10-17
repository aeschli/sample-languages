puts "puts works" 
puts " with line breaks."

print "print works"
print " with no line breaks."

printf("\n\nprintf formats numbers like %7.2f, and
strings like %s.",3.14156,"me")

/usr/bin/env ruby <<-SH
 
  echo "hello, $USER. I wish to list some files of yours"
 printf("\n\nprintf formats numbers like %7.2f, and
strings like %s.",3.14156,"me")

SH

class Range
def by(step)
x = self.begin
if exclude_end?
while x < self.end
yield x
x += step	
end
else
while x <= self.end
yield x
x += step
end
end
end
end

(0..10).by(2) {|x| print x}
