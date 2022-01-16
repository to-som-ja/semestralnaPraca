  <?php



 $DB_HOST = 'localhost';
    $DB_NAME = 'tankMuseum';
    $DB_USER = 'root';
    $DB_PASS = 'dtb456';
$conn = mysqli_connect("localhost","root","dtb456","tankMuseum");
$result = mysqli_query($conn,"SELECT * FROM news");
$data = array();
while ($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}
echo json_encode($data);

