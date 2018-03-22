            <hr/>
            <em>&copy; created By Niraj Jani,Software Engineer</em>
		</div>
			<script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.orgchart.js"></script>
		<script type = 'text/javascript' src = "<?= base_url(); ?>assets/js/cloudpanda.js"></script>
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.throttle.js"></script>
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.typorize.js"></script>
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.curvedtext.js"></script>
		<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/stringspiral.js"></script>
        <script>
            $(document).ready(function() {
                $('.session-message').hide();
                <?php if($this->session->flashdata('msg')){ ?>
                    $('.session-message').html('<?php echo $this->session->flashdata('msg'); ?>').show().delay(1000).fadeOut('slow');
                <?php } ?>
            });
        </script>
	</body>
</html>
