<!DOCTYPE html>
<html lang="it">
<head>
    <title>Document</title>
    <script>
        function deleteRow(id){
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                console.log(id+" eliminato")
                }
            };
            xmlHttp.open("DELETE", "http://localhost:8080/student.php?id="+id, true);
            xmlHttp.send();
        }
        function addRow(){
            let json = {
                id: 1000,
                name: "marco",
                surname:"senior",
                sidi_code: "1234",
                tax_code: "12345"
            }
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                console.log("aggiunto")
                }
            };
            xmlHttp.open("POST", "http://localhost:8080/student.php", true);
            xmlHttp.send(json);
        }
    </script>
</head>
<body>
    <input type="button" value="delete test" onclick="deleteRow(88)">
    <input type="button" value="add test" onclick="addRow()">
</body>
</html>

<?php
/* include('./class/Student.php');
    $body = file_get_contents("php://input");
$js_decoded = json_decode($body, true);

$student = new Student();

$student->_name = $js_decoded["_name"];
$student->_surname = $js_decoded["_surname"];
$student->_sidiCode = $js_decoded["_sidiCode"];
$student->_taxCode = $js_decoded["_taxCode"];

$js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
header("Content-Type: application/json");
echo($js_encode);  */

/* curl --header "Content-Type: application/json" --request POST --data '{"_name":"Ciccio", "_surname":"Benve"}' http://localhost:8080 */
?> 
