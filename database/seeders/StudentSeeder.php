<?php

namespace Database\Seeders;

use App\Models\batch;
use App\Models\course;
use App\Models\CourseSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $courseIds = course::all()->pluck('id', 'course_name')->toArray();

        // Fetch batch IDs
        $batchIds = batch::all()->pluck('id', 'batch_name')->toArray();

        $students = [
            ['id' => '24CSE10001', 'first_name' => 'Aarav', 'last_name' => 'Sharma', 'email' => 'aarav.sharma1@example.com', 'number' => '9876543210', 'street_address' => '12 Gandhi Street', 'city' => 'Delhi', 'state' => 'DL', 'pincode' => '110001', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Rajesh Sharma', 'mother_name' => 'Sunita Sharma'],
            ['id' => '24ME10002', 'first_name' => 'Vivaan', 'last_name' => 'Patel', 'email' => 'vivaan.patel2@example.com', 'number' => '8765432109', 'street_address' => '34 Nehru Street', 'city' => 'Mumbai', 'state' => 'MH', 'pincode' => '400001', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Ravi Patel', 'mother_name' => 'Meera Patel'],
            ['id' => '24CE10003', 'first_name' => 'Aditya', 'last_name' => 'Singh', 'email' => 'aditya.singh3@example.com', 'number' => '7654321098', 'street_address' => '56 Ambedkar Road', 'city' => 'Chennai', 'state' => 'TN', 'pincode' => '600001', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Vijay Singh', 'mother_name' => 'Anita Singh'],
            ['id' => '24EE10004', 'first_name' => 'Aiden', 'last_name' => 'Smith', 'email' => 'aiden.smith4@example.com', 'number' => '6543210987', 'street_address' => '78 Churchill Road', 'city' => 'New York', 'state' => 'NY', 'pincode' => '10001', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'John Smith', 'mother_name' => 'Jane Smith'],
            ['id' => '24IT10005', 'first_name' => 'Liam', 'last_name' => 'Johnson', 'email' => 'liam.johnson5@example.com', 'number' => '5432109876', 'street_address' => '90 Elm Street', 'city' => 'Los Angeles', 'state' => 'CA', 'pincode' => '90001', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Michael Johnson', 'mother_name' => 'Sarah Johnson'],
            ['id' => '24BT10006', 'first_name' => 'Saanvi', 'last_name' => 'Reddy', 'email' => 'saanvi.reddy6@example.com', 'number' => '4321098765', 'street_address' => '23 Patel Road', 'city' => 'Bangalore', 'state' => 'KA', 'pincode' => '560001', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Krishna Reddy', 'mother_name' => 'Lakshmi Reddy'],
            ['id' => '24CSE10007', 'first_name' => 'Ishaan', 'last_name' => 'Gupta', 'email' => 'ishaan.gupta7@example.com', 'number' => '3210987654', 'street_address' => '45 Main Street', 'city' => 'Kolkata', 'state' => 'WB', 'pincode' => '700001', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Arun Gupta', 'mother_name' => 'Poonam Gupta'],
            ['id' => '24ME10008', 'first_name' => 'Rohan', 'last_name' => 'Kumar', 'email' => 'rohan.kumar8@example.com', 'number' => '2109876543', 'street_address' => '89 Park Avenue', 'city' => 'Hyderabad', 'state' => 'TS', 'pincode' => '500001', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Suresh Kumar', 'mother_name' => 'Meena Kumar'],
            ['id' => '24CE10009', 'first_name' => 'Kavya', 'last_name' => 'Rao', 'email' => 'kavya.rao9@example.com', 'number' => '1098765432', 'street_address' => '67 River Road', 'city' => 'Pune', 'state' => 'MH', 'pincode' => '411001', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Venkatesh Rao', 'mother_name' => 'Sujatha Rao'],
            ['id' => '24EE10010', 'first_name' => 'Aryan', 'last_name' => 'Mehta', 'email' => 'aryan.mehta10@example.com', 'number' => '9876543210', 'street_address' => '12 Lakeside', 'city' => 'Ahmedabad', 'state' => 'GJ', 'pincode' => '380001', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Rajesh Mehta', 'mother_name' => 'Sunita Mehta'],
            ['id' => '24IT10011', 'first_name' => 'Ananya', 'last_name' => 'Singh', 'email' => 'ananya.singh11@example.com', 'number' => '8765432109', 'street_address' => '34 Hill Road', 'city' => 'Chandigarh', 'state' => 'CH', 'pincode' => '160001', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Ravi Singh', 'mother_name' => 'Meena Singh'],
            ['id' => '24BT10012', 'first_name' => 'Vihaan', 'last_name' => 'Verma', 'email' => 'vihaan.verma12@example.com', 'number' => '7654321098', 'street_address' => '56 East End', 'city' => 'Jaipur', 'state' => 'RJ', 'pincode' => '302001', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Sandeep Verma', 'mother_name' => 'Anjali Verma'],
            ['id' => '24CSE10013', 'first_name' => 'Mia', 'last_name' => 'Sharma', 'email' => 'mia.sharma13@example.com', 'number' => '6543210987', 'street_address' => '78 North Street', 'city' => 'Delhi', 'state' => 'DL', 'pincode' => '110002', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Rajeev Sharma', 'mother_name' => 'Kavita Sharma'],
            ['id' => '24ME10014', 'first_name' => 'Riya', 'last_name' => 'Patel', 'email' => 'riya.patel14@example.com', 'number' => '5432109876', 'street_address' => '90 South Street', 'city' => 'Mumbai', 'state' => 'MH', 'pincode' => '400002', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Vijay Patel', 'mother_name' => 'Nita Patel'],
            ['id' => '24CE10015', 'first_name' => 'Arjun', 'last_name' => 'Singh', 'email' => 'arjun.singh15@example.com', 'number' => '3210987654', 'street_address' => '23 East Street', 'city' => 'Chennai', 'state' => 'TN', 'pincode' => '600002', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Raj Singh', 'mother_name' => 'Rani Singh'],
            ['id' => '24EE10016', 'first_name' => 'Nisha', 'last_name' => 'Smith', 'email' => 'nisha.smith16@example.com', 'number' => '2109876543', 'street_address' => '34 Lake Road', 'city' => 'New York', 'state' => 'NY', 'pincode' => '10002', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Robert Smith', 'mother_name' => 'Lisa Smith'],
            ['id' => '24IT10017', 'first_name' => 'Karan', 'last_name' => 'Jones', 'email' => 'karan.jones17@example.com', 'number' => '8765432109', 'street_address' => '45 Oak Avenue', 'city' => 'Los Angeles', 'state' => 'CA', 'pincode' => '90002', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Daniel Jones', 'mother_name' => 'Jessica Jones'],
            ['id' => '24BT10018', 'first_name' => 'Pooja', 'last_name' => 'Reddy', 'email' => 'pooja.reddy18@example.com', 'number' => '5432109876', 'street_address' => '67 Main Road', 'city' => 'Bangalore', 'state' => 'KA', 'pincode' => '560002', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Srinivas Reddy', 'mother_name' => 'Radha Reddy'],
            ['id' => '24CSE10019', 'first_name' => 'Zara', 'last_name' => 'Gupta', 'email' => 'zara.gupta19@example.com', 'number' => '9876543210', 'street_address' => '89 East Road', 'city' => 'Kolkata', 'state' => 'WB', 'pincode' => '700002', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Sunil Gupta', 'mother_name' => 'Aarti Gupta'],
            ['id' => '24ME10020', 'first_name' => 'Simran', 'last_name' => 'Kumar', 'email' => 'simran.kumar20@example.com', 'number' => '8765432109', 'street_address' => '12 Park Avenue', 'city' => 'Hyderabad', 'state' => 'TS', 'pincode' => '500002', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Prakash Kumar', 'mother_name' => 'Geeta Kumar'],
            ['id' => '24CE10021', 'first_name' => 'Ayesha', 'last_name' => 'Rao', 'email' => 'ayesha.rao21@example.com', 'number' => '5432109876', 'street_address' => '34 Central Street', 'city' => 'Pune', 'state' => 'MH', 'pincode' => '411002', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Raj Rao', 'mother_name' => 'Anjali Rao'],
            ['id' => '24EE10022', 'first_name' => 'Aria', 'last_name' => 'Mehta', 'email' => 'aria.mehta22@example.com', 'number' => '2109876543', 'street_address' => '56 Hill Road', 'city' => 'Ahmedabad', 'state' => 'GJ', 'pincode' => '380002', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Harsh Mehta', 'mother_name' => 'Sonia Mehta'],
            ['id' => '24IT10023', 'first_name' => 'Isha', 'last_name' => 'Singh', 'email' => 'isha.singh23@example.com', 'number' => '8765432109', 'street_address' => '67 East End', 'city' => 'Chandigarh', 'state' => 'CH', 'pincode' => '160002', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Amit Singh', 'mother_name' => 'Seema Singh'],
            ['id' => '24BT10024', 'first_name' => 'Ravi', 'last_name' => 'Verma', 'email' => 'ravi.verma24@example.com', 'number' => '7654321098', 'street_address' => '89 North Road', 'city' => 'Jaipur', 'state' => 'RJ', 'pincode' => '302002', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Rajesh Verma', 'mother_name' => 'Kavita Verma'],
            ['id' => '24CSE10025', 'first_name' => 'Rishi', 'last_name' => 'Sharma', 'email' => 'rishi.sharma25@example.com', 'number' => '9876543210', 'street_address' => '12 Central Avenue', 'city' => 'Delhi', 'state' => 'DL', 'pincode' => '110003', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Raj Sharma', 'mother_name' => 'Nisha Sharma'],
            ['id' => '24ME10026', 'first_name' => 'Tanya', 'last_name' => 'Patel', 'email' => 'tanya.patel26@example.com', 'number' => '8765432109', 'street_address' => '34 New Road', 'city' => 'Mumbai', 'state' => 'MH', 'pincode' => '400003', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Arun Patel', 'mother_name' => 'Sneha Patel'],
            ['id' => '24CE10027', 'first_name' => 'Vikram', 'last_name' => 'Singh', 'email' => 'vikram.singh27@example.com', 'number' => '5432109876', 'street_address' => '56 East End', 'city' => 'Chennai', 'state' => 'TN', 'pincode' => '600003', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Ramesh Singh', 'mother_name' => 'Aarti Singh'],
            ['id' => '24EE10028', 'first_name' => 'Sofia', 'last_name' => 'Smith', 'email' => 'sofia.smith28@example.com', 'number' => '2109876543', 'street_address' => '67 West Street', 'city' => 'New York', 'state' => 'NY', 'pincode' => '10003', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Henry Smith', 'mother_name' => 'Grace Smith'],
            ['id' => '24IT10029', 'first_name' => 'Arya', 'last_name' => 'Jones', 'email' => 'arya.jones29@example.com', 'number' => '7654321098', 'street_address' => '89 Oak Street', 'city' => 'Los Angeles', 'state' => 'CA', 'pincode' => '90003', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Peter Jones', 'mother_name' => 'Laura Jones'],
            ['id' => '24BT10030', 'first_name' => 'Nikhil', 'last_name' => 'Reddy', 'email' => 'nikhil.reddy30@example.com', 'number' => '8765432109', 'street_address' => '90 South Avenue', 'city' => 'Bangalore', 'state' => 'KA', 'pincode' => '560003', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Srinivas Reddy', 'mother_name' => 'Sita Reddy'],
            ['id' => '24CSE10031', 'first_name' => 'Riya', 'last_name' => 'Gupta', 'email' => 'riya.gupta31@example.com', 'number' => '3210987654', 'street_address' => '12 Hill Street', 'city' => 'Kolkata', 'state' => 'WB', 'pincode' => '700003', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Sandeep Gupta', 'mother_name' => 'Mona Gupta'],
            ['id' => '24ME10032', 'first_name' => 'Raj', 'last_name' => 'Kumar', 'email' => 'raj.kumar32@example.com', 'number' => '2109876543', 'street_address' => '45 Central Avenue', 'city' => 'Hyderabad', 'state' => 'TS', 'pincode' => '500003', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Raj Kumar', 'mother_name' => 'Nisha Kumar'],
            ['id' => '24CE10033', 'first_name' => 'Priya', 'last_name' => 'Rao', 'email' => 'priya.rao33@example.com', 'number' => '9876543210', 'street_address' => '56 Park Street', 'city' => 'Pune', 'state' => 'MH', 'pincode' => '411003', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Suresh Rao', 'mother_name' => 'Kavita Rao'],
            ['id' => '24EE10034', 'first_name' => 'Amit', 'last_name' => 'Mehta', 'email' => 'amit.mehta34@example.com', 'number' => '8765432109', 'street_address' => '23 Lake Avenue', 'city' => 'Ahmedabad', 'state' => 'GJ', 'pincode' => '380003', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Arun Mehta', 'mother_name' => 'Poonam Mehta'],
            ['id' => '24IT10035', 'first_name' => 'Neha', 'last_name' => 'Singh', 'email' => 'neha.singh35@example.com', 'number' => '3210987654', 'street_address' => '45 Elm Road', 'city' => 'Chandigarh', 'state' => 'CH', 'pincode' => '160003', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Deepak Singh', 'mother_name' => 'Rita Singh'],
            ['id' => '24BT10036', 'first_name' => 'Divya', 'last_name' => 'Verma', 'email' => 'divya.verma36@example.com', 'number' => '6543210987', 'street_address' => '67 North Avenue', 'city' => 'Jaipur', 'state' => 'RJ', 'pincode' => '302003', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Vijay Verma', 'mother_name' => 'Meena Verma'],
            ['id' => '24CSE10037', 'first_name' => 'Kabir', 'last_name' => 'Sharma', 'email' => 'kabir.sharma37@example.com', 'number' => '9876543210', 'street_address' => '89 South Road', 'city' => 'Delhi', 'state' => 'DL', 'pincode' => '110004', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Sunil Sharma', 'mother_name' => 'Aarti Sharma'],
            ['id' => '24ME10038', 'first_name' => 'Sonia', 'last_name' => 'Patel', 'email' => 'sonia.patel38@example.com', 'number' => '8765432109', 'street_address' => '34 Gandhi Street', 'city' => 'Mumbai', 'state' => 'MH', 'pincode' => '400004', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Ravi Patel', 'mother_name' => 'Neelam Patel'],
            ['id' => '24CE10039', 'first_name' => 'Maya', 'last_name' => 'Singh', 'email' => 'maya.singh39@example.com', 'number' => '5432109876', 'street_address' => '78 North Avenue', 'city' => 'Chennai', 'state' => 'TN', 'pincode' => '600004', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Raj Singh', 'mother_name' => 'Poonam Singh'],
            ['id' => '24EE10040', 'first_name' => 'Zoya', 'last_name' => 'Smith', 'email' => 'zoya.smith40@example.com', 'number' => '2109876543', 'street_address' => '56 Main Street', 'city' => 'New York', 'state' => 'NY', 'pincode' => '10004', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'David Smith', 'mother_name' => 'Ella Smith'],
            ['id' => '24IT10041', 'first_name' => 'Aarav', 'last_name' => 'Jones', 'email' => 'aarav.jones41@example.com', 'number' => '3210987654', 'street_address' => '89 Park Avenue', 'city' => 'Los Angeles', 'state' => 'CA', 'pincode' => '90004', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Michael Jones', 'mother_name' => 'Sarah Jones'],
            ['id' => '24BT10042', 'first_name' => 'Ravi', 'last_name' => 'Reddy', 'email' => 'ravi.reddy42@example.com', 'number' => '4321098765', 'street_address' => '23 Hill Road', 'city' => 'Bangalore', 'state' => 'KA', 'pincode' => '560004', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Srinivas Reddy', 'mother_name' => 'Lakshmi Reddy'],
            ['id' => '24CSE10043', 'first_name' => 'Arjun', 'last_name' => 'Sharma', 'email' => 'arjun.sharma43@example.com', 'number' => '8765432109', 'street_address' => '12 South Avenue', 'city' => 'Delhi', 'state' => 'DL', 'pincode' => '110005', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Raj Sharma', 'mother_name' => 'Neha Sharma'],
            ['id' => '24ME10044', 'first_name' => 'Pooja', 'last_name' => 'Patel', 'email' => 'pooja.patel44@example.com', 'number' => '9876543210', 'street_address' => '34 Gandhi Avenue', 'city' => 'Mumbai', 'state' => 'MH', 'pincode' => '400005', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Jitendra Patel', 'mother_name' => 'Meena Patel'],
            ['id' => '24CE10045', 'first_name' => 'Rohan', 'last_name' => 'Singh', 'email' => 'rohan.singh45@example.com', 'number' => '2109876543', 'street_address' => '56 Park Avenue', 'city' => 'Chennai', 'state' => 'TN', 'pincode' => '600005', 'course_id' => 5, 'batch_id' => 5, 'group' => 'A', 'semester' => '1', 'father_name' => 'Manoj Singh', 'mother_name' => 'Sita Singh'],
            ['id' => '24EE10046', 'first_name' => 'Siddhi', 'last_name' => 'Smith', 'email' => 'siddhi.smith46@example.com', 'number' => '2109876543', 'street_address' => '78 Lake Street', 'city' => 'New York', 'state' => 'NY', 'pincode' => '10005', 'course_id' => 6, 'batch_id' => 6, 'group' => 'B', 'semester' => '1', 'father_name' => 'Vikram Smith', 'mother_name' => 'Aarti Smith'],
            ['id' => '24IT10047', 'first_name' => 'Kiran', 'last_name' => 'Singh', 'email' => 'kiran.singh47@example.com', 'number' => '3210987654', 'street_address' => '56 Oak Avenue', 'city' => 'Chandigarh', 'state' => 'CH', 'pincode' => '160004', 'course_id' => 7, 'batch_id' => 7, 'group' => 'A', 'semester' => '1', 'father_name' => 'Manoj Singh', 'mother_name' => 'Anju Singh'],
            ['id' => '24BT10048', 'first_name' => 'Ananya', 'last_name' => 'Reddy', 'email' => 'ananya.reddy48@example.com', 'number' => '8765432109', 'street_address' => '12 Lake Road', 'city' => 'Bangalore', 'state' => 'KA', 'pincode' => '560005', 'course_id' => 8, 'batch_id' => 8, 'group' => 'B', 'semester' => '1', 'father_name' => 'Ram Reddy', 'mother_name' => 'Sunita Reddy'],
            ['id' => '24CSE10049', 'first_name' => 'Manoj', 'last_name' => 'Gupta', 'email' => 'manoj.gupta49@example.com', 'number' => '9876543210', 'street_address' => '67 Hill Street', 'city' => 'Kolkata', 'state' => 'WB', 'pincode' => '700004', 'course_id' => 3, 'batch_id' => 3, 'group' => 'A', 'semester' => '1', 'father_name' => 'Rajesh Gupta', 'mother_name' => 'Kavita Gupta'],
            ['id' => '24ME10050', 'first_name' => 'Tanu', 'last_name' => 'Kumar', 'email' => 'tanu.kumar50@example.com', 'number' => '8765432109', 'street_address' => '45 New Road', 'city' => 'Hyderabad', 'state' => 'TS', 'pincode' => '500004', 'course_id' => 4, 'batch_id' => 4, 'group' => 'B', 'semester' => '1', 'father_name' => 'Raj Kumar', 'mother_name' => 'Nisha Kumar']
        ];
        


        function generateRandomTimestamp($startYear = 2021, $endYear = 2024) {
            $startTimestamp = strtotime("01-01-$startYear");
            $endTimestamp = strtotime("31-12-$endYear");
        
            return date("Y-m-d H:i:s", mt_rand($startTimestamp, $endTimestamp));
        }
        
        function storeStudentInUserAndStudentTables($student) {
            // Generate user data based on student data
            $name = $student['first_name'] . ' ' . $student['last_name'];
            $email = $student['email'];
            $password = substr($student['first_name'], 0, 4) . substr($student['number'], -1);
            $role = 'student';
            $userId = $student['id'];
            $timestamp = generateRandomTimestamp();
        
            // Insert data into users table
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password), // Hash the password
                'role' => $role,
                'userId' => $userId,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        
            // Insert data into students table
            DB::table('students')->insert([
                'id' => $student['id'],
                'first_name' => $student['first_name'],
                'last_name' => $student['last_name'],
                'email' => $student['email'],
                'number' => $student['number'],
                'street_address' => $student['street_address'],
                'city' => $student['city'],
                'state' => $student['state'],
                'pincode' => $student['pincode'],
                'course_id' => $student['course_id'],
                'batch_id' => $student['batch_id'],
                'group' => $student['group'],
                'semester' => $student['semester'],
                'father_name' => $student['father_name'],
                'mother_name' => $student['mother_name'],
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);

         
        }
        foreach ($students as $student) {
            storeStudentInUserAndStudentTables($student);

            
        }
}
}
