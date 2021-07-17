
            <div class="panel">
              <div class="panel-heading"><h3>Personal Details</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="" class="other-table table  table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td class="update__data"><span><?php echo $lead_row['first_name']?></span></td>
                            <td>Last Name</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['last_name'])) { echo $lead_row['last_name']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>Phone Number</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['phone'])) { echo $lead_row['phone']; } else { echo "Empty";}?>
                                </span>
                            </td>
                            <td>Alternative Number</td>
                            <td class="update__data"><span>Empty</span></td>
                        </tr>
                    
                        <tr>
                            <td>Email</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['email'])) { echo $lead_row['email']; } else { echo "Empty";}?>
                                </span>
                            </td>
                            <td>Birthday</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['birthday'])) { echo $lead_row['birthday']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>address</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['address'])) { echo $lead_row['address']; } else { echo "Empty";}?>
                                </span>
                            </td>
                            <td>Pincode</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['pincode'])) { echo $lead_row['pincode']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>