<?php
  include('config/constants.php');

  $adminid = 1;

  // $attncheck = "SELECT * FROM attn_tbl WHERE status= 'login' AND date BETWEEN '$fdate' AND '$ldate' ORDER BY datename DESC";
  $attncheck = "SELECT COUNT(code_id) AS countstudents, id, name, lastname, grade_level, section, status, time ,datename FROM attn_tbl WHERE date BETWEEN '2023-01-01' AND '2023-02-25' GROUP BY code_id";
  $attnconn = mysqli_query($conn,$attncheck);
  $attncount = mysqli_num_rows($attnconn);
  $attn = 0;

  // $attend_total = "SELECT * FROM attn_tbl WHERE admin_id = '$adminid' AND date BETWEEN '$fdate' AND '$ldate' GROUP BY name ";
  $attend_total = "SELECT * FROM attn_tbl WHERE status= 'login' AND admin_id = '$adminid' AND date GROUP BY code_id ORDER BY datename DESC";
  $attend_total_conn = mysqli_query($conn,$attend_total);
  $attend_total_num = mysqli_num_rows($attend_total_conn);
  
  $total_attn = 0;
  if($attend_total_num>0)
  {
      ?>
          <table>
              <!-- <tr>
                  <th>code id</th>
                  <th>name</th>
                  <th>lastname</th>
                  <th>status</th>
              </tr> -->
              <?php
                  while($attend_total_row = mysqli_fetch_assoc($attend_total_conn))
                  {
                      $count_code_id = $attend_total_row['code_id'];
                      $count_name = $attend_total_row['name'];
                      $count_lastname = $attend_total_row['lastname'];
                      $count_status = $attend_total_row['status'];
                      ?>
                          <tr>
                              <!-- <?php echo $total_attn++; ?> -->
                              <!-- <td><?php echo $count_code_id; ?></td>
                              <td><?php echo $count_name; ?></td>
                              <td><?php echo $count_lastname; ?></td>
                              <td><?php echo $count_status; ?></td>
                          </tr> -->
                      <?php
                  }
                      $total_id = $total_attn++;
              ?>

          </table>
      <?php
  }

  if($attncount>0)
  {
      ?>
          <table class="hoverTable" style="width: 720px;" >
              <tr style="text-align:left">
                  <!-- <th scope="col">id</th> -->
                  <th scope="col">name</th>
                  <th scope="col">last name</th>
                  <th scope="col">grade level</th>
                  <th scope="col">section</th>
                  <th scope="col" style="text-align:center">no. of times</th>
              </tr>
              <?php  
          
                  while($row_attn=mysqli_fetch_assoc($attnconn))
                  {
                      $id = $row_attn['id'];
                      
                      $name = $row_attn['name'];
                      $lname = $row_attn['lastname'];
                      $level = $row_attn['grade_level'];
                      $section = $row_attn['section'];
                      // $time = $row_attn['time'];
                      // $datename = $row_attn['datename'];
                      $qty = $row_attn['countstudents'];
                      ?>
                          <tr class="tabler" style="text-align:left" onclick="onRow('<?php echo $id; ?>')">
                              <!-- <td><?php echo $attn++; ?></td> -->
                              
                              <td><?php echo $name; ?></td>
                              <td><?php echo $lname; ?></td>
                              <td><?php echo $level; ?></td>
                              <td><?php echo $section; ?></td>
                              <td  style="text-align:center"><?php echo $qty; ?></td>
                              <!-- <td><input type="button" value="view" onclick="onRow('<?php echo $id; ?>')"></td>  -->
                          </tr>
                      <?php
                  }
                  echo '<div style="text-align:left; font-family:Lucidatypewriter">Total Attendance:  <span style="font-size: 20px">' .$attn++.'</span></div>';
                  // echo '<div style="text-align:left; font-family:Lucidatypewriter">from  <span style="font-size: 16px">' .$fdate.'</span> to <span style="font-size: 16px">' .$lastdate.'</span> </div>';
                  echo '<br>';
              ?>

              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="text-align:center; font-size: 18px;"><?php echo 'Total: '.$total_id.' times'; ?></td>
              </tr>
          </table>
      <?php
  }
?>