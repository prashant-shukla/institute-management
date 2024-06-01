fields, field_position_top, field_position_left


1) create student_courses table

2) create certificate_fields table
id, field, table, column

student_name (students.name)
father_name (students.father_name)
course_title (courses.name) 
product_covered (students.software_covered) 
duration (courses.course_period)
from_date (student_courses.enrolled)
to_date (student_courses.completion)
date (student_courses.certificate_issued)
certificate_number (student_courses.certificate_number)
remark (student_courses.remark)

3) add repeater field with following values:
- certificate_fields (dropdown), top (number in px), left (number in px)