<footer id="footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2015</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->



        <!-- <script src="/template/js/jquery.js"></script> -->
        <script src="/template/js/bootstrap.min.js"></script>
        <!-- <script src="/template/js/jquery.scrollUp.min.js"></script> -->
        <script src="/template/js/price-range.js"></script>
        <!-- <script src="/template/js/jquery.prettyPhoto.js"></script> -->
        <script src="/template/js/main.js"></script>
        <script src="/template/js/ajaxCart.js"></script>
        <script src="/template/js/siema.min.js"></script>
        <script>
             const mySiema = new Siema({
                  loop: true,
                  perPage: 3
            });

            const prev = document.querySelector('.prev');
            const next = document.querySelector('.next');

            prev.addEventListener('click', () => mySiema.prev());
            next.addEventListener('click', () => mySiema.next());
        </script>
    </body>
</html>
