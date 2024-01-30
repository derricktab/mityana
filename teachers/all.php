<?php if ($success == "true") { ?>
                <div class="container a-alert">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS!</strong> &nbsp; Students Marks Set Succesfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } else if ($success == "false") { ?>
                <div class="container a-alert">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> &nbsp; Something went wrong.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } ?>