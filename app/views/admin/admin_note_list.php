<?php
    if (isset($data['notes']) and count($data['notes']) > 0) {
        foreach ($data['notes'] as $note) {
            ?>
            <div class="card shadow-sm mb-3" note-id="<?php echo $note['id']; ?>">
                <div class="card-header">
                    <a href="<?php echo $data['filterLink']; ?>/user/<?php echo $note['username']; ?>"><?php echo $note['username']; ?></a>
                    /
                    <a href="<?php echo $data['filterLink']; ?>/email/<?php echo $note['email']; ?>"><?php echo $note['email']; ?></a>
                    <span>создал 
                        <?php
                            echo $note['created_at'];
                        ?>
                    </span>
                    <div class="d-inline float-right">
                        <?php
                            if ($note['status']) {
                                echo '<a class="badge badge-success font-weight-bold note-status" note-status="1" href="'. $data['filterLink'] .'/status/'. $note['status'] .'">ВЫПОЛНЕНО</a>';
                            } else {
                                echo '<a class="badge badge-dark font-weight-bold note-status" note-status="0" href="'. $data['filterLink'] .'/status/'. $note['status'] .'">НЕ ВЫПОЛНЕНО</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="card-body>">
                    <div class="card-body">
                        <div class="mb-3 note-description"><?php echo $note['description']; ?></div>
                        <div class="text-right">
                            <button type="button" class="btn btn-dark btn-sm note-edit" style="border: none;" data-toggle="modal" data-target="#editNote">✏ РЕДАКТИРОВАТЬ</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
            <div class="container mt-5 mb-5 text-center">
                <h1 class="display-1 pt-4" style="height: 150px">Тут пусто</h1>
            </div>
        <?php
    }
?>