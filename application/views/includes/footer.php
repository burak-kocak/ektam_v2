</div> <!-- #canvas END -->
    
    <div class="clear"></div>
    
    <footer>
        © Copyright 2017-2018 EKTAM Makine Sanayi ve Tic. A.Ş. - All Rights Reserved.
    </footer>
    <!-- Mainly scripts -->
    <script>
        $(document).ready(function () {
            $(".clickable-row").on("click", function() {
                window.location = $(this).data("href");
            });
        });
    </script>
</body>
</html>