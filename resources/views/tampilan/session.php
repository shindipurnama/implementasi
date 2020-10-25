// Shindi Purnama Putri
// 151811513009

// modal

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Getaway Timeout</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            <p>Sesi akan segera berakhir. apakah anda ingin menambah sesi?</p>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" onclick="reload()" class="btn btn-primary btn-session-yes">Yes</button>
            <button type="button" data-dismiss="modal"  onclick="stop()" class="btn btn-secondary btn-session-no">No</button>
        </div>
        </div>
    </div>
</div>

// script 

<script type="text/javascript">
    var idleTime = 0;
    $(document).ready(function () {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 30000); // 30 Detik

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime = idleTime + 1;
        if (idleTime > 59) { // 30 minutes
        $('#myModal').modal('show');
        if (idleTime > 60) { // 20 minutes
            $('#myModal').modal('hide');
            window.alert("Getaway Timeout");
        }
        }
    }

    function reload(){
    window.location.reload();
    }

    function stop(){
    $('#myModal').modal('hide');
    window.alert("Getaway Timeout");
    }
</script>  