<section class="content-header">
    <h1><small>Halaman Upload Foto</small></h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('laporan'); ?>"><i class="fa fa-image"></i> Halaman Upload Foto</a></li>
        <li class="active"><a href="<?= base_url('laporan/view_images'); ?>"> Halaman Foto</a></li>
    </ol>
</section>
<section class="content">
    <div class="row ">			
        <form enctype="multipart/form-data" action="" method="post">
            <div class="form-group  col-sm-3">
                <label>Choose Files</label>
                <input type="file" class="form-control" name="upload_Files[]" multiple/>				
            </div>   
            <div class="form-group  col-sm-6">		
                <input  type="submit" class="btn btn-default" name="submitForm" id="submitForm"/>	
            </div>		
    </div> 	
    <div class="row ">
        <p><?= $this->session->flashdata('statusMsg'); ?></p>
    </div>
    <div class="row">
        <div class="gallery">
            <ul>
                <?php if (!empty($gallery)): foreach ($gallery as $file): ?>
                        <li>
                            <img src="<?= base_url('uploads/files/' . $file['file_name']); ?>" alt="" >
                            <p>Uploaded On <?= date("j M Y", strtotime($file['created'])); ?></p>
                        </li>
                        <?php
                    endforeach;
                else:
                    ?>
                    <p>No File uploaded.....</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>