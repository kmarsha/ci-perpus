<script>
  function successNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#5cb85c',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

  function errorNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#d9534f',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

</script>

<?php
    if (session()->has('success')) {
        $msg = session()->getFlashdata('success');
        echo "<script>successNotif('$msg')</script>";
    }

    if (session()->has('error')) {
        $msg = session()->getFlashdata('error');
        echo "<script>errorNotif('$msg')</script>";
    }
?>