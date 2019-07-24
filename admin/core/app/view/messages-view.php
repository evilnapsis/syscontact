<section class="content">
<?php
$data["posts"]=ContactData::getAll();
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mensajes Recibidos
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-users"></i> Mensajes Recibidos
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-body">
                                    <table class="table datatable table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Asunto</th>
                                                <th>Mensaje</th>
                                                <th>Fecha</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($data["posts"] as $post):?>
                                            <tr>
                                                <td><?=$post->fullname;?></td>
                                                <td><?=$post->email;?></td>
                                                <td><?=$post->subject;?></td>
                                                <td><?=$post->message;?></td>
                                                <td><?=$post->created_at;?></td>

                                                <td style="width:70px;">
                                                <a href="./?action=delmessage&id=<?=$post->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                </section>