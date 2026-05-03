Overview
db.php ek single-file PHP project hai jo bina kisi database (MySQL, SQLite, etc.) ke student ka data store aur display karta hai. Saara data PHP array mein hota hai aur foreach loop se HTML table mein render hota hai.

Features
•	No Database — Koi MySQL, SQLite ya koi bhi database ki zarurat nahi
•	Single File — Sirf ek db.php file, koi aur file nahi
•	10 Data Fields — id, naam, roll_no, class, subject, marks, grade, fees, city, status
•	8 Student Records — Ready-made sample data
•	Stats Cards — Total students, Active count, Average marks, Total fees
•	Color-coded Grades — A+ se D tak alag alag colors
•	Status Badges — Active (green) / Inactive (red)
•	XSS Protection — htmlspecialchars() se safe output
•	Responsive Design — Mobile friendly dark theme UI

Requirements
Sirf PHP 7.4+ chahiye. Koi extension, koi composer, koi database nahi.
•	PHP 7.4 ya usse upar
•	XAMPP / WAMP / LAMP — Local server ke liye
•	Ya PHP built-in server (php -S)

Setup & Run Karna
Option 1: PHP Built-in Server (Fastest)
cd /path/to/your/folder
php -S localhost:8000
Phir browser mein kholain:
http://localhost:8000/db.php
Option 2: XAMPP / WAMP
•	db.php file ko C:/xampp/htdocs/ mein copy karein
•	XAMPP Control Panel se Apache start karein
•	Browser mein kholain: http://localhost/db.php

File Structure
db.php                  ← Aik hi file, sab kuch isi mein
  ├── $students[]       ← PHP Array (database ki jagah)
  ├── gradeColor()      ← Helper function
  ├── Stats variables   ← $total, $active, $avg_marks
  └── HTML + CSS        ← Table view with dark theme

Data Fields (10 Total)
Har student record mein ye 10 fields hain:

Field	Type	Description	Example
id	Integer	Unique ID (auto)	001, 002...
naam	String	Student full name	Ali Hassan
roll_no	String	Roll number	CS-101
class	String	Degree program	BSc IT, MCS
subject	String	Main subject	PHP Programming
marks	Integer	Marks out of 100	88, 95, 72...
grade	String	Letter grade	A+, A, B+, B, C, D
fees	Integer	Fee in PKR	25000, 35000
city	String	Student city	Lahore, Multan...
status	String	Enrollment status	Active / Inactive

Grade System

Grade	Marks Range	Color Code	Status
A+	90-100	Green #16a34a	Excellent
A	80-89	Blue #2563eb	Very Good
B+	75-79	Purple #7c3aed	Good
B	65-74	Cyan #0891b2	Average
C	55-64	Amber #d97706	Below Avg
D	0-54	Red #dc2626	Fail

Data Customize Karna
Naya Student Add Karna
[
  'id'      => 9,
  'name'    => 'Farrukh Ali',
  'roll_no' => 'CS-109',
  'class'   => 'BSc IT',
  'subject' => 'PHP',
  'marks'   => 76,
  'grade'   => 'B+',
  'fees'    => 25000,
  'city'    => 'Sialkot',
  'status'  => 'Active',
],
Column Add/Remove Karna
$students array mein naya key add karein aur HTML table mein usi key ka column bana dein.

How it works:
•	PHP script run hoti hai aur $students array load hoti hai
•	Stats calculate hoti hain — count(), array_filter(), array_sum()
•	HTML page render hota hai jis mein foreach loop se har row banti hai
•	Grade color gradeColor() function se milta hai
•	htmlspecialchars() se har value ko safe karke output diya jata hai

