<?php
    $message = [];

    if(isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    } else if($exception) {
        $message = [
            'type' => 'error',
            'message' => $exception->getMessage()
        ];
    }

?>

    <?php if($message){ ?>
        <div class="my-3 alert alert-<?= $message['type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
            <?= $message['message'] ?>
        </div>
    <?php } ?>