<?php

  add_action('admin_head', 'styling_acf_sections');

  function styling_acf_sections() {
    echo '<style>
      .acf-flexible-content .layout .acf-fc-layout-handle {
        line-height: 2em;
        background-color: #dcdcdc;
        font-size: 18px;
      }
      .acf-table > tbody > tr > td{
        border-width: 15px 0 0 1px;
      }

      .acf-field-message:not(.message-margins){
        background-color: #DFDFDF;
        font-size: 18px;
      }
      .acf-field-message.message-margins{
        background-color: #f3f3f3;
        font-size: 16px;
      }

      .acf-field .acf-label{
        margin: 0;
      }

    </style>';
  }


  add_filter( 'should_load_separate_core_block_assets', '__return_true' );
?>