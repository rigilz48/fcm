<tr>
    <td class="text-center"><?= $row->id; ?></td>
    <td><?= $row->username; ?></td>
    <td><?= $row->email; ?></td>
    <td class="text-center"><?= empty($group) ? '' : '<span class="text-uppercase">'.$group[0]['name'].'</span>'; ?></td>
    <td class="text-center"><a href="#" class="btn btn-sm btn-circle btn-active-users" data-id="<?= $row->id;?>" data-active="<?= $row->active == 1 ? 1 : 0 ;?>" title="Klik untuk Mengaktifkan atau Menonaktifkan"><?= $row->active == 1 ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' ; ?></a></td>
    <!-- <td class="text-center"><a href="#" class="btn btn-sm btn-warning btn-circle btn-change-pw" data-id="<?= $row->id;?>" data-username1="<?= $row->username;?>" title="Ubah Password" ><i class="fas fa-key"></i></a> <a href="#" class="btn btn-success btn-circle btn-sm btn-change-group" data-id="<?= $row->id;?>" data-username2="<?= $row->username;?>" title="Ubah Grup"><i class="fas fa-tasks"></i></a> <a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-user" data-id="<?= $row->id;?>" data-username3="<?= $row->username;?>" title="Hapus User"><i class="fas fa-trash"></i></a></td> -->
    <td class="text-center"><a href="#" class="btn btn-sm btn-warning btn-circle btn-change-pw" data-id="<?= $row->id;?>" data-username1="<?= $row->username;?>" title="Ubah Password" ><i class="fas fa-key"></i></a> <a href="#" class="btn btn-success btn-circle btn-sm btn-change-group" data-id="<?= $row->id;?>" data-username2="<?= $row->username;?>" title="Ubah Grup"><i class="fas fa-tasks"></i></a></td>
 </tr>