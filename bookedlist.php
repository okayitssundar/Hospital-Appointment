<html> <?php  
 include "db.php";
 $title = 'Booked List - XYZ Hospital';
 include "header.php";
?> <body>
    <div id="booked-list">
      <h2>Doctors Available</h2>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody> <?php
      $result = mysqli_query($conn,"SELECT * FROM `appointment`");
while($row = mysqli_fetch_array($result))
{
echo "
					<tr>";
echo "
						<td>" . $row['name'] . "</td>";
echo "
						<td>" . $row['doctor'] . "</td>";
echo "
						<td>" . $row['date'] . "</td>";
echo "
						<td>" . $row['time'] . "</td>";
echo "
					</tr>";
}
echo "
				</table>";

mysqli_close($conn);
    ?> </tbody>
      </table>
    </div>
  </body>
</html>