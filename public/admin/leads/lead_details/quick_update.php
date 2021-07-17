
            <div class="panel">
              <div class="panel-heading"><h3>Quick Update</h3></div>
              <div class="panel-body">
                <div class="responsive-table">
                  <table id="" class="other-table table  table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Enquiry Status</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['status_name'])) { echo $lead_row['status_name']; } else { echo "Empty";}?>
                                </span> 
                            </td>
                        </tr>
                    
                        <tr>
                            <td>Enquiry Type</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['type_name'])) { echo $lead_row['type_name']; } else { echo "Empty";}?>
                                </span>
                            </td>
                            
                        </tr>
                    
                        <tr>
                            <td>Enquiry Source</td>
                            
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['source_name'])) { echo $lead_row['source_name']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Enquiry Subsource</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['subsource_name'])) { echo $lead_row['subsource_name']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>School Name</td>
                            <td class="update__data">
                                <span>
                                    <?php if(!empty($lead_row['school_name'])) { echo $lead_row['school_name']; } else { echo "Empty";}?>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>