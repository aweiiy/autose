<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body.offcanvas-active{
        overflow:hidden;
    }

    .offcanvas-header{ display:none; }

    .screen-darken{
        height: 100%; width:0%;
        z-index: 30;
        position: fixed; top: 0; right: 0;
        opacity:0; visibility:hidden;
        background-color: rgba(34, 34, 34, 0.6);
        transition:opacity .2s linear, visibility 0.2s, width 2s ease-in;
    }

    .screen-darken.active{
        z-index:10;
        transition:opacity .3s ease, width 0s;
        opacity:1;
        width:100%;
        visibility:visible;
    }

    /* ============ mobile view ============ */
    @media all and (max-width: 991px) {

        .offcanvas-header{ display:block; }

        .mobile-offcanvas{
            visibility: hidden;
            transform:translateX(-100%);
            border-radius:0;
            display:block;
            position: fixed;  top: 0; left:0;
            height: 100%; width:80%;
            z-index: 1200;
            overflow-y: scroll;
            overflow-x: hidden;
            transition: visibility .3s ease-in-out, transform .3s ease-in-out;
        }

        .mobile-offcanvas.show{
            visibility: visible; 	transform: translateX(0);
        }
        .mobile-offcanvas .container, .mobile-offcanvas .container-fluid{
            display: block;
        }

    }
    /* ============ mobile view .end// ============ */
</style>
<div class="col-lg-3 pe-xl-4">
    <div class="offcanvas offcanvas-start offcanvas-collapse bg-dark show" id="filters-sidebar" style="visibility: visible;" aria-modal="true" role="dialog">


        <div class="offcanvas-body py-lg-4">

        </div>
    </div>
    <div class="modal-backdrop fade show"></div></div>
<button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filters</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function darken_screen(yesno){
        if( yesno == true ){
            document.querySelector('.screen-darken').classList.add('active');
        }
        else if(yesno == false){
            document.querySelector('.screen-darken').classList.remove('active');
        }
    }

    function close_offcanvas(){
        darken_screen(false);
        document.querySelector('.mobile-offcanvas.show').classList.remove('show');
        document.body.classList.remove('offcanvas-active');
    }

    function show_offcanvas(offcanvas_id){
        darken_screen(true);
        document.getElementById(offcanvas_id).classList.add('show');
        document.body.classList.add('offcanvas-active');
    }

    document.addEventListener("DOMContentLoaded", function(){

        document.querySelectorAll('[data-trigger]').forEach(function(everyelement){
            let offcanvas_id = everyelement.getAttribute('data-trigger');
            everyelement.addEventListener('click', function (e) {
                e.preventDefault();
                show_offcanvas(offcanvas_id);
            });
        });

        document.querySelectorAll('.btn-close').forEach(function(everybutton){
            everybutton.addEventListener('click', function (e) {
                close_offcanvas();
            });
        });

        document.querySelector('.screen-darken').addEventListener('click', function(event){
            close_offcanvas();
        });

    });
    // DOMContentLoaded  end
</script>
