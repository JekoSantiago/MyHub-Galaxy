                            <table class="table">
								<thead>
									<tr>
										<th>Truck No.</th>
										<th>Driver Name</th>
										<th class="text-center">Total Stores</th>
                                        <th class="text-center">Total # of Actual Containers</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($items as $row) : ?>
									<tr>
										<td><?= $row->TruckNo; ?></th>
										<td><?= $row->DriverName; ?></td>
										<td class="text-center"><?= $row->DeliveryCount; ?></td>
                                        <td class="text-center"><?= $row->LoadCount; ?></td>
                                    </tr>
								<?php endforeach; ?>
								</tbody>
							</table>