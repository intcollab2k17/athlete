<tr>
                        <td><?php echo $row['sports_name'];?></td>
                        <td><?php echo $row['event_name'];?></td>
                         <td>
                          <?php
                            $aw=mysqli_query($con,"select * from award where athlete_id='$aid'")or die(mysqli_error($con));
                                while($rowaw=mysqli_fetch_array($aw)){
                                  echo $rowaw['award']." | ";
                                }
                          ?>
                      
                        </td>
                      </tr>
                      
        