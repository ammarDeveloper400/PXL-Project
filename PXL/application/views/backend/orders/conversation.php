<?php 
    $order = $this->db->query("SELECT * FROM orders WHERE id = ".$id)->result_object()[0];
    $user = $this->db->query("SELECT * FROM users WHERE id = ".$order->user_id)->result_object()[0];
    $store = $this->db->query("SELECT * FROM stores WHERE id = ".$order->vendor_id)->result_object()[0];
?>
<style type="text/css">
    .table {
        border: 1px solid #ccc;
    }
    .table th {
        width: 20%;
        background: #f0f0f0;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 12px;
    }
    .lesspad  th {
    }
    .lesspad  td {
        padding: 5px 20px;
        border: 1px solid #f0f0f0;
        font-size: 13px;
    }
    .conversation {
        height: 400px;
        overflow-y: auto;
        border: 2px solid #f0f0f0;
        padding: 10px;
    }
    .chat_bubble {
        clear: both;
        padding: 10px 20px;
        margin-bottom: 10px;
        border-radius: 5px 5px 0px 5px;
        color: #fff;
        font-size: 14px;
        line-height: 18px;
        font-weight: 400;
    }
</style>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        
    </div>
   
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Chat Conversation -::- #00H<?php echo $order->id; ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <div class="conversation">
                                    <?php 
                                    $chat_history = $this->db->query("SELECT * FROM chats WHERE convo_id = '".$order->convo_id."'")->result_object();
                                        foreach ($chat_history as $key => $chat) {
                                            if($chat->sender_id == $order->user_id){$float = "right"; $bg = "108a63";} else{$float = "left";$bg = "4f5467";}
                                    ?>
                                        <div class="chat_bubble" style="float: <?php echo $float;?>; background: <?php if($chat->media==1){} else {?>#<?php echo $bg; }?>;">
                                            <?php if($chat->media==1){?>
                                                <a href="<?php echo base_url();?>resources/uploads/media/<?php echo $chat->message;?>" target="_blank">
                                                    <img style="width: 175px;" src="<?php echo base_url();?>resources/uploads/media/<?php echo $chat->message;?>">
                                                </a>
                                            <?php } else { ?>
                                                <?php echo $chat->message;?>
                                            <?php } ?>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".conversation").animate({ scrollTop: $('.conversation').prop("scrollHeight")}, 1000);
    })
</script>