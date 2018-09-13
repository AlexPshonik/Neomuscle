<?php
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'Ni_COG_Dashboard' ) ) { 
	class Ni_COG_Dashboard {
		 public function __construct(){
		 	//$this->get_profit_summary();
			//$this->test();
		 }
		 /*Not in user*/
		 function test2(){
		 	global $wpdb;
			$query = " SELECT ";
			$query .= " order_items.order_item_name as product_name ";
			$query .= " ,product_id.meta_value as product_id ";
			$query .= " ,variation_id.meta_value as variation_id ";
			$query .= " ,qty.meta_value as qty ";
			$query .= " , line_total.meta_value ";
			  
			//$query .= " ,SUM(qty.meta_value) as qty ";
			//$query .= " ,SUM(ROUND(line_total.meta_value,2)) as line_total ";
			$query .= " ,ni_cost_goods.meta_value as ni_cost_goods ";
			$query .= " ,posts.ID ";
			$query .= "	FROM {$wpdb->prefix}posts as posts ";			
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_items as order_items ON order_items.order_id=posts.ID ";
			
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as product_id ON product_id.order_item_id=order_items.order_item_id ";
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as variation_id ON variation_id.order_item_id=order_items.order_item_id ";
			
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as qty ON qty.order_item_id=order_items.order_item_id ";
			
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as line_total ON line_total.order_item_id=order_items.order_item_id ";
			
			$query .= " LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as ni_cost_goods ON ni_cost_goods.order_item_id=order_items.order_item_id ";
			
			
			$query .= "	WHERE 1=1 ";
			$query .= " AND posts.post_type ='shop_order' ";
			$query .= " AND order_items.order_item_type ='line_item'";
			$query .= " AND product_id.meta_key ='_product_id'";
			$query .= " AND variation_id.meta_key ='_variation_id'";
			$query .= " AND qty.meta_key ='_qty'";
			$query .= " AND line_total.meta_key ='_line_total'";
			$query .= " AND ni_cost_goods.meta_key ='_ni_cost_goods'";
			$query .= " AND ni_cost_goods.meta_value>0";
			$query .= " AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed') ";
			//$query .= " GROUP BY product_id, variation_id ";
					
			$row = $wpdb->get_results($query);			
			$this->print_data($row);
		 }
		 function page_init(){
		?>
        <style>
        	.ni_cog_feature ul li { font-size:14px; font-weight:bold; color:#0277bd; height:20px; padding:5px;}
			.ni_cog_view_demo_btn {
			  border-style: solid;
			  border-width : 1px 1px 1px 1px;
			  text-decoration : none;
			  padding : 6px;
			  border-color : #0277bd;
			  background:#0277bd;
			  color:#FFF;
			  
			 
			  margin:5px;
			 
			}
				</style>
				
    
				<div style="padding-top:25px"></div>

				<div class="box-title" style="padding-left:25px;"><h2 style="border-bottom: 1px solid #dddddd;padding-bottom: 15px;"><?php _e('Анализ продаж', 'NiWooCommerceSalesReport'); ?></h2></div>
				 <div class="box-data">
					<div class="columns-box"  style="border-top:4px solid #BA68C8">
						<div class="columns-title">Total Sales</div>
						<div>
							<div class="columns-icon" style="color:#BA68C8"><i class="fa fa-cart-plus fa-4x"></i></div>
							<div class="columns-value" style="color:#BA68C8"><?php  echo wc_price( $this->get_total_sales("ALL")); ?></div>	
						</div>
					</div>
					<div class="columns-box" style="border-top:4px solid #BA68C8">
						<div class="columns-title">This Year Sales</div>
						<div>
							<div class="columns-icon"  style="color:#EF6C00"><i class="fa fa-cart-plus fa-4x"></i></div>
							<div class="columns-value"  style="color:#EF6C00"><?php  echo wc_price( $this->get_total_sales("YEAR")); ?></div>	
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #00897B">
						<div class="columns-title">This Month Sales</div>
						<div>
							<div class="columns-icon"  style="color:#00897B"><i class="fa fa-cart-plus fa-4x"></i></div>
							<div class="columns-value" style="color:#00897B"><?php  echo wc_price( $this->get_total_sales("MONTH")); ?></div>	
						</div>
					</div>
					<div class="columns-box" style="border-top:4px solid #039BE5">
						<div class="columns-title">This Week Sales</div>
						<div>
							<div class="columns-icon" style="color:#039BE5"><i class="fa fa-cart-plus fa-4x"></i></div>
							<div class="columns-value" style="color:#039BE5"><?php  echo wc_price( $this->get_total_sales("WEEK")); ?></div>	
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #795548">
						<div class="columns-title">Today Sales</div>
						<div>
							<div class="columns-icon"  style="color:#795548"><i class="fa fa-cart-plus fa-4x"></i></div>
							<div class="columns-value"  style="color:#795548"><?php  echo wc_price( $this->get_total_sales("DAY")); ?></div>	
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
        <div class="box-data">
					<div class="columns-box" style="border-top:4px solid #BA68C8">
						<div class="columns-title">Total Sales Count</div>
						<div>
							<div class="columns-icon" style="color:#BA68C8"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#BA68C8"><?php echo $this->get_total_sales_count("ALL"); ?></div>	
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #EF6C00">
						<div class="columns-title">This Year Sales Count</div>
						<div>
							<div class="columns-icon" style="color:#EF6C00"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#EF6C00"><?php echo $this->get_total_sales_count("YEAR"); ?></div>	
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #00897B">
						<div class="columns-title">This Month Sales Count</div>
						<div>
							<div class="columns-icon"  style="color:#00897B"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value"  style="color:#00897B"><?php echo $this->get_total_sales_count("MONTH"); ?></div>
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #039BE5">
						<div class="columns-title">This Week Sales Count</div>
						<div>
							<div class="columns-icon" style="color:#039BE5"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#039BE5"><?php echo $this->get_total_sales_count("WEEK"); ?></div>
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #795548">
						<div class="columns-title">Today Sales Count</div>
						<div>
							<div class="columns-icon" style="color:#795548"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#795548"><?php echo $this->get_total_sales_count("DAY"); ?></div>
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
                 
        <div class="box-title" style="padding-left:25px;"><h2 style="border-bottom: 1px solid #dddddd;padding-bottom: 15px;"><?php _e('Анализ прибыли и убытков', 'NiWooCommerceSalesReport'); ?></h2> </div>
			<div class="box-data">
					<div class="columns-box"  style="border-top:4px solid #BA68C8">
						<div class="columns-title">Total Profit</div>
						<div>
							<div class="columns-icon" style="color:#BA68C8"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#BA68C8"><?php echo wc_price($this->get_profit_summary("ALL")); ?></div>	
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #EF6C00">
						<div class="columns-title">This Year Profit</div>
						<div>
							<div class="columns-icon" style="color:#EF6C00"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#EF6C00"><?php echo wc_price($this->get_profit_summary("YEAR")); ?></div>	
						</div>
					</div>
					<div class="columns-box" style="border-top:4px solid #00897B">
						<div class="columns-title">This Month Profit</div>
						<div>
							<div class="columns-icon"  style="color:#00897B"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value"  style="color:#00897B"><?php echo wc_price($this->get_profit_summary("MONTH")); ?></div>
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #039BE5">
						<div class="columns-title">This Week Profit</div>
						<div>
							<div class="columns-icon" style="color:#039BE5"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#039BE5"><?php echo wc_price($this->get_profit_summary("WEEK")); ?></div>
						</div>
					</div>
					<div class="columns-box"  style="border-top:4px solid #795548">
						<div class="columns-title">Today Profit</div>
						<div>
							<div class="columns-icon" style="color:#795548"><i class="fa fa-line-chart fa-3x"></i></div>
							<div class="columns-value" style="color:#795548"><?php echo wc_price( $this->get_profit_summary("DAY")); ?></div>
						</div>
					</div>
					<div style="clear:both"></div>
				</div>
            
        </div>
		<?php	
		 }
		 function get_total_sales($period="CUSTOM",$start_date=NULL,$end_date=NULL){
			global $wpdb;	
			$query = "SELECT
					SUM(order_total.meta_value)as 'total_sales'
					FROM {$wpdb->prefix}posts as posts			
					LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID 
					
					WHERE 1=1
					AND posts.post_type ='shop_order' 
					AND order_total.meta_key='_order_total' ";
					
			$query .= " AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
						
						";
			if ($period =="DAY"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = SUBDATE(date_format(CURDATE(), '%Y-%m-%d'),1) "; 
				$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
			}
			if ($period =="WEEK"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 WEEK) "; 
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      WEEK(date_format( posts.post_date, '%Y-%m-%d')) = WEEK(CURRENT_DATE()) ";
			}
			if ($period =="MONTH"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 MONTH) "; 
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      MONTH(date_format( posts.post_date, '%Y-%m-%d')) = MONTH(CURRENT_DATE()) ";
			}
			if ($period =="YEAR"){		
				//$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
				$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
			}
			
			
			//echo $query;		
					
			//$query .=" AND   date_format( posts.post_date, '%Y-%m-%d') BETWEEN '{$start_date}' AND '{$end_date}'";
					
			$results = $wpdb->get_var($query);
			$results = isset($results) ? $results : "0";
			return $results;
		}
		function get_total_sales_count($period="CUSTOM",$start_date=NULL,$end_date=NULL){
			global $wpdb;	
			$query = "SELECT
					count(order_total.meta_value)as 'sales_count'
					FROM {$wpdb->prefix}posts as posts			
					LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID 
					
					WHERE  1 = 1
					AND posts.post_type ='shop_order' 
					AND order_total.meta_key='_order_total' ";
					//if ($start_date!=NULL && $end_date!=NULL)
					//$query .=" AND   date_format( posts.post_date, '%Y-%m-%d') BETWEEN '{$start_date}' AND '{$end_date}'";
			$query .= " AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed') ";
			
			if ($period =="DAY"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
			//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = SUBDATE(date_format(CURDATE(), '%Y-%m-%d'),1) "; 
			$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
			}
			if ($period =="WEEK"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 WEEK) "; 
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      WEEK(date_format( posts.post_date, '%Y-%m-%d')) = WEEK(CURRENT_DATE()) ";
			}
			if ($period =="MONTH"){		
			//	$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 MONTH) "; 
			
			$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      MONTH(date_format( posts.post_date, '%Y-%m-%d')) = MONTH(CURRENT_DATE()) ";
			
			}
			if ($period =="YEAR"){		
				//$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
				$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
			}
			//echo $query;
			$results = $wpdb->get_var($query);	
			$results = isset($results) ? $results : "0";	
			return $results;
		}
		function get_profit_summary($period="CUSTOM",$start_date=NULL,$end_date=NULL){
			global $wpdb;
			$query = "";
			$query = "SELECT
			posts.ID as order_id
			,posts.post_status as order_status
			,woocommerce_order_items.order_item_id as order_item_id
			, date_format( posts.post_date, '%Y-%m-%d') as order_date 
			,woocommerce_order_items.order_item_name
			, ni_cost_goods.meta_value as ni_cost_goods
			, line_total.meta_value as line_total
			, qty.meta_value as qty
			FROM {$wpdb->prefix}posts as posts			
			LEFT JOIN  {$wpdb->prefix}woocommerce_order_items as woocommerce_order_items ON woocommerce_order_items.order_id=posts.ID  ";
			
			$query .= "	LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as ni_cost_goods ON ni_cost_goods.order_item_id=woocommerce_order_items.order_item_id  ";
			
			$query .= "	LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as line_total ON 	line_total.order_item_id=woocommerce_order_items.order_item_id  ";
			$query .= "	LEFT JOIN  {$wpdb->prefix}woocommerce_order_itemmeta as qty ON 	qty.order_item_id=woocommerce_order_items.order_item_id  ";
			
		$query .= " WHERE 1=1
			AND posts.post_type ='shop_order' 
			AND woocommerce_order_items.order_item_type ='line_item'
			AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
			AND ni_cost_goods.meta_key='_ni_cost_goods' 
			AND line_total.meta_key='_line_total' 
			AND qty.meta_key='_qty' 
			
			";
			if ($period =="DAY"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
			//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = SUBDATE(date_format(CURDATE(), '%Y-%m-%d'),1) "; 
			$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 DAY) "; 
			}
			if ($period =="WEEK"){		
				//$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 WEEK) "; 
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      WEEK(date_format( posts.post_date, '%Y-%m-%d')) = WEEK(CURRENT_DATE()) ";
			}
			if ($period =="MONTH"){		
			//	$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') > DATE_SUB(date_format(NOW(), '%Y-%m-%d'), INTERVAL 1 MONTH) "; 
			
			$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      MONTH(date_format( posts.post_date, '%Y-%m-%d')) = MONTH(CURRENT_DATE()) ";
			
			}
			if ($period =="YEAR"){		
				//$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
				$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
			}
			//echo $query;
			$row = $wpdb->get_results( $query);
			$total_profit = 0;
			$sales_price = 0;
			$qty= 0;
			$line_total= 0;
			$cost_goods= 0;
			$cost_total= 0;
			
			foreach($row as $key=>$value){
				$qty= 0;
				$line_total  = 0;
				$cost_good =0;
				
				$qty = isset($value->qty)?$value->qty:0;
				$line_total = isset($value->line_total)?$value->line_total:0;
			
				$cost_goods = isset($value->ni_cost_goods)?$value->ni_cost_goods:0;
				$cost_total = ($cost_goods * $qty  ); /*Total Cost*/
				$total_profit += ($line_total-$cost_total);
			}
			//$this->print_data($row);
			return isset($total_profit)?$total_profit:0;
			
		}
		function print_data($data){
			print "<pre>";
			print_r($data);
			print "</pre>";
		 }
	}
}