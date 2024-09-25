<?php
require('fpdf/fpdf.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connections
$con1 = new mysqli("localhost", "java", "Java_420_da", "customer details");
if ($con1->connect_error) {
    die("Connection failed: " . $con1->connect_error);
}

$con2 = new mysqli("localhost", "java", "Java_420_da", "mechanic");
if ($con2->connect_error) {
    die("Connection failed: " . $con2->connect_error);
}

$con3 = new mysqli("localhost", "java", "Java_420_da", "admin");
if ($con3->connect_error) {
    die("Connection failed: " . $con3->connect_error);
}

// Fetch request and customer data
$request_id = $_GET['req_id']; // Assuming the request ID is passed as a query parameter
$query1 = "SELECT * FROM request WHERE id = ?";
$stmt1 = $con1->prepare($query1);
$stmt1->bind_param("i", $request_id);
$stmt1->execute();
$result1 = $stmt1->get_result();
$request_customer_data = $result1->fetch_assoc();
$stmt1->close();

// Debugging: Check if request and customer data is fetched
if (!$request_customer_data) {
    die("No request/customer data found for the given request ID.");
}

// Fetch mechanic data
$mechanic_name = $request_customer_data['mechanic_assign'];
$query2 = "SELECT * FROM mechanic_info WHERE name = ?";
$stmt2 = $con2->prepare($query2);
$stmt2->bind_param("s", $mechanic_name);
$stmt2->execute();
$result2 = $stmt2->get_result();
$mechanic_data = $result2->fetch_assoc();
$stmt2->close();

// Debugging: Check if mechanic data is fetched
if (!$mechanic_data) {
    die("No mechanic data found for the assigned mechanic.");
}

// Fetch admin data
$query3 = "SELECT * FROM admin_info WHERE id = 1";
$result3 = $con3->query($query3);
$admin_data = $result3->fetch_assoc();

$query4 = "SELECT * FROM customer WHERE id = ?";
$stmt4 = $con1->prepare($query4);
$stmt4->bind_param("i", $request_customer_data['user_id']);
$stmt4->execute();
$result4 = $stmt4->get_result();
$customer_data = $result4->fetch_assoc();
$stmt4->close();

// Debugging: Check if admin data is fetched
if (!$admin_data) {
    die("No admin data found.");
}

// Close database connections
$con1->close();
$con2->close();
$con3->close();

// Creating PDF
class PDF_UTF8 extends FPDF
{
    function Header()
    {
        // Service Center Info
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(0, 10, 'S.L REPAIR & SERVICE CENTER', 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, ' B Colony, Alex Nagar, Madhavaram, Chennai-600051', 0, 1, 'C');
        $this->Cell(0, 10, 'Contact: +91 9840248156', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function InvoiceDetails($request_customer_data, $customer_data, $mechanic_data, $admin_data)
    {
        // Customer Info
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Customer Details', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Name: ' . ucwords($customer_data['name']), 0, 1, 'L');
        $this->Cell(0, 10, 'Email: ' . $customer_data['email'], 0, 1, 'L');
        $this->Cell(0, 10, 'Mobile: ' . $customer_data['mobile'], 0, 1, 'L');
        $this->Cell(0, 10, 'Address: ' . ucwords($customer_data['address']), 0, 1, 'L');
        $this->Ln(5);

        // Vehicle Info
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Vehicle Details', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Vehicle Number: ' . strtoupper($request_customer_data['vehicle_number']), 0, 1, 'L');
        $this->Cell(0, 10, 'Brand: ' . ucwords($request_customer_data['vehicle_brand']), 0, 1, 'L');
        $this->Cell(0, 10, 'Model: ' . ucwords($request_customer_data['vehicle_model']), 0, 1, 'L');
        $this->Cell(0, 10, 'Problem Description: ' . ucwords($request_customer_data['problem_description']), 0, 1, 'L');
        $this->Ln(5);

        // Mechanic and Charges Info
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Repair Details', 0, 1, 'L');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 10, 'Mechanic: ' . ucwords($mechanic_data['name']), 0, 1, 'L');
        $this->Cell(0, 10, 'Repair Charge: Rs.' . $request_customer_data['bill_amount'], 0, 1, 'L');
        $this->Cell(0, 10, 'Labour Charge: Rs.' . $request_customer_data['mechanic_charge'], 0, 1, 'L');
        $this->Ln(10);

        // Total Charge
        $total = $request_customer_data['total_bill'];
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Total Charge: Rs.' . $total, 0, 1, 'R');
    }
}

$pdf = new PDF_UTF8('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->InvoiceDetails($request_customer_data, $customer_data, $mechanic_data, $admin_data);
$pdf->Output('I', 'Invoice_' . $request_customer_data['id'] . '.pdf');
print_r($request_customer_data);
print_r($mechanic_data);
print_r($admin_data);
?>
