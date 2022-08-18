<html> <?php  
 include "db.php";
 $title = 'Doctors - XYZ Hospital';
 include "header.php";
?> <body>
    <div id="doctors">
      <h2>Doctors Available</h2>
      <table>
        <thead>
          <tr>
            <th>Doctor's Name</th>
            <th>Role</th>
            <th>Arrive at</th>
            <th>Sign-off at</th>
          </tr>
        </thead>
        <tbody> <?php
      $result = mysqli_query($conn,"SELECT * FROM `doctors`");
while($row = mysqli_fetch_array($result))
{
echo "
					<tr>";
echo "
						<td>" . $row['doctor'] . "</td>";
echo "
						<td>" . $row['specialist'] . "</td>";
echo "
						<td>" . $row['start'] . "</td>";
echo "
						<td>" . $row['end'] . "</td>";
echo "
					</tr>";
}
echo "
				</table>";

mysqli_close($conn);
    ?> </tbody>
      </table>
    </div>
  </body></html>