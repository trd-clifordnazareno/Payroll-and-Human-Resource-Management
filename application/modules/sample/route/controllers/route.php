<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends MX_Controller {




function home($data) {
    /*$data['header'] = $this->load->view("templte/headers");
    $data['footer'] = $this->load->view("templte/footer");*/
    $this->load->view('files/files/home/home', $data);
    
}
function login_page($data){
    $this->load->view("files/files/logs/login", $data);
}
function load_add($data){
    $this->load->view("files/files/ajax_tables/modal_add", $data);
}
function load_file_add(){
    $this->load->view("files/files/ajax_tables/modal_add");
}
function get_add($data_playlist_add){
    $this->load->view("files/files/ajax_tables/modal_add", $data_playlist_add);
}
function get_all_add($data_files){
    $this->load->view("files/files/ajax_tables/modal_add", $data_files);
}
function get_adds_2($data_playlist_add){
    $this->load->view("files/files/ajax_tables/modal_adds2", $data_playlist_add);
}
function get_all_add3($data_files){
    $this->load->view("files/files/ajax_tables/modal_add", $data_files);
}
function clients_template($data){
    $this->load->view('files/files/clients/view_clients', $data);
}
function load_clients($data){
    $this->load->view("files/files/ajax_tables/view_clients", $data);
}
function get_loc($data){
    $this->load->view("files/files/ajax_tables/view_loc_per_client", $data);
}
function create_clients($data){
    $this->load->view("files/files/clients/create_clients", $data);
}
function add_clients($data_suc){
    $this->load->view("files/files/error/success", $data_suc);
}
function clients_add(){
    $this->load->view("files/files/clients/add_clients", $datas);
}
function add_new_client_list($data_suc){
    $this->load->view("files/files/clients/ajax/success", $data_suc);
}
function load_clients_names($client_list){
    $this->load->view("files/files/playlist/add_content", $client_list);
}
function table_clients($data_list){
    $this->load->view("files/files/clients/ajax/table_clients", $data_list);
}
function listh(){
    $this->load->view("files/files/sample/samples");
}
function display_crawler($datax){
    $this->load->view("files/files/sample/tik", $datax);
}
function tik($itm){
    $this->load->view("files/files/files/sample/tik", $itm);
}
function display_crawler_interval($datax){
    $this->load->view("files/files/sample/tik", $datax);
}
function samplesss(){
    $this->load->view("files/files/sample/sample");
}
function display_crawler_interval_sample($datax){
    $this->load->view("files/files/sample/tik", $datax);
}
function display_crawler_sample($datax){
    $this->load->view("files/files/sample/tik", $datax);
}
function err_stick_note($data_err){
    $this->load->view("files/error/sticky_note", $data_err);
}
function success($data_err){
    $this->load->view("files/clients/ajax/success", $data_err);
}
function get_crawler_location($data_crawler){
    $this->load->view("files/crawler/view_crawler", $data_crawler);
}
function edit_crawler($data_crawler){
    $this->load->view("files/crawler/edit_crawler", $data_crawler);
}
function edit_crawler_spic($data){
    $this->load->view("files/ajax_tables/crawlers", $data);
}
function add_new_crawler($data){
    $this->load->view("files/ajax_tables/add_crawler", $data);
}
function err_add_new_crawler($data){
    $this->load->view("files/error/sticky_note", $data);
}
function success_add_entry_crawler($data){
    $this->load->view("files/ajax_tables/crawlers_load", $data);
}
function load_add_list($data){
    $this->load->view("files/ajax_tables/modal", $data);
}
function g($data){
    $this->load->view("files/ajax_tables/modal_add", $data);
}
function display_login_clients(){
    $this->load->view("files/client_logs/view_client_log");
}
function Display_Client_Login_Logs($data_logs){
    $this->load->view('files/client_logs/client_logs', $data_logs);
}
function failuretoair($data){
    $this->load->view('files/files/users/display_users', $data);
}
function view_failure($datas){
    $this->load->view("files/failure_to_air/fail_page", $datas);
}
function  err_add_new_client_list($data){
    $this->load->view("files/clients/ajax/error", $data);
}
function failure_to_air(){
    $this->load->view("files/failure_to_air/failure_to_air");
}
function method_form($loc){
    $this->load->view("files/failure_to_air/ajax/form", $loc);
}
function err_insert_fail_loc($data){
    $this->load->view("files/error/sticky_note", $data);
}
function success_insert_fail_loc($data_loc_items){
    $this->load->view("files/failure_to_air/ajax/loc_fail", $data_loc_items);
}
function go($datas){
    $this->load->view("files/failure_to_air/ajax/loc_data", $datas);
}
function button($button){
    $this->load->view("files/failure_to_air/ajax/button", $button);
}
function failure_report_view($datas){
    $this->load->view("pdf/failure_report", $datas);
}
function get_all_loc($get_loc){
    $this->load->view("files/failure_to_air/fail_set_up", $get_loc);
}
function create_loc($data){
    $this->load->view('files/locations/create_loc', $data);
}
function loc_regester($data){
    $this->load->view("files/error/log_error", $data);
}
function loc_err_regester($datas){
    $this->load->view("files/error/loc_err_regester", $datas);
}
function success_loc_regester($data){
    $this->load->view("files/reports/view_dig_signage", $data);
}
function new_upload(){
    $this->load->view("files/new_upload/new_upload");
}
function edit_add($data){
    $this->load->view("files/files/error/success", $data);
}
function add_content($data){
    $this->load->view("files/files/playlist/add_content", $data);
}
function add_new_content($data_play_list){
    $this->load->view("files/ajax_tables/fresh_playlist_load", $data_play_list);
}
function upload_new_files(){
    $this->load->view("new_upload_files");
}
function modal(){
    $this->load->view("modal");
}
function reports_page($data){
    $this->load->view('files/reporting/reports', $data);
}
function txt_page($data){
    $this->load->view("files/reporting/ajax/files", $data);
}
function go_page($data){
    $this->load->view("files/reporting/ajax/table_logs", $data);
}
function pdf($datas){
    $this->load->view("pdf/pdfreport", $datas);
}
function pdf_loops($datas){
    $this->load->view("pdf/pdfreport_loops", $datas);
}
function dis_rep($data){
    $this->load->view("files/reporting/view_rep", $data);
}
function view_rep($datas){
    $this->load->view("pdf/pdf_ajax/pdfreport_loops_page", $datas);
}
function pdf_per_loops($datas){
    $this->load->view("pdf/new_pdf_per_loc", $datas);
}
function pdf_loops_per_clients_loc($datas){
    $this->load->view("pdf/pdf_per_loc", $datas);
}
function pdf_per_loops_per_loc($datas){
    $this->load->view("pdf/pdf_ajax/loop_count", $datas);
}
function pdf_loops_per_clients_loc_per_loc($datas){
    $this->load->view("pdf/pdf_per_loc", $datas);
}
function new_pdf_per_loops($datas){
    $this->load->view("pdf/new_pdf_per_loc", $datas);
}
function pdf_per_loops_download($datas){
    $this->load->view("pdf/new_pdf_per_loc", $datas);
}
function reportbydates($datas){
    $this->load->view("pdf/pdf_date", $datas);
}
function reportbydates_download($datas){
    $this->load->view("pdf/pdf_date", $datas);
}
function display_user_page($data){
    $this->load->view('files/users/display_users', $data);
}
function all_users($data){
    $this->load->view('files/ajax_tables/users', $data);
}
function method_load_user($data){
    $this->load->view('files/users/view_user_details', $data);
}
function method_edit_user($data){
    $this->load->view("files/error/success", $data);
}
function regester_user_page($data){
    $this->load->view('files/users/regester_users', $data);
}
function method_regester($data){
    $this->load->view('files/error/log_error', $data);
}
function err_method_regester($data){
    $this->load->view('files/error/log_error', $data);
}
function success_method_regester($data){
    $this->load->view('files/error/success', $data);
}
function view_status($data){
    $this->load->view("files/ajax_tables/view_status", $data);
}
function get_location($data){
    $this->load->view("files/locations/view_loc", $data);
}
function err_save_new_thread($data){
    $this->load->view("files/error/sticky_note", $data);
}
function get_client_images($data){
    $this->load->view("files/ajax_tables/image", $data);
}
function ajax_pagination(){
    $this->load->view("ajax_pagination");
}
function pag(){
    $this->load->view("pag");
}
function ajaxupload(){
    $this->load->view('file_upload_ajax', NULL);
}
function sample_goh($data){
    $this->load->view('sample', $data);
}
function log_header_goh(){
    $this->load->view('log/log_header');
}
        








function home_page($data){
    $this->load->view("files/files/home/home", $data);
}
function view_dig_signage($data){
    $this->load->view("files/files/reports/view_dig_signage", $data);
}
function csv_upload(){
    $this->load->view("files/new_upload/csv_upload");
}
        






function input_mediums(){
    //$data['header'] = $this->load->view("templte/headers");
    //$data['footer'] = $this->load->view("templte/footer");
    $this->load->view("files/mediums/input_mediums");
}
function create_new_mediums($data){
    $this->load->view('files/mediums/ajax/success', $data);
}
			



}




