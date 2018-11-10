<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <title>Backstage - Error Page</title>

    </head>
    
    <body>
        <header><h1>BackStage</h1></header>
        <div>
            <h1>Database Error</h1>
            <p>There was an error connecting to the database</p>
            <p>Check that the database is installed &amp; named correctly</p>
            <p>Error message: <?php echo $error_message;?></p>
        </div>
        
        
        
        
        
        
        <footer >
                <p>Copyright &copy; Backstage 2017</p>
            <!-- /.container -->
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
