<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		 		$this->load->library('session');
                $sesiUser= $this->session->userdata('username');
                $sesiPassword= $this->session->userdata('password');


                if ($sesiUser&&$sesiPassword)
                {
                    $this->load->model('adminmodel');
                    $tes1=$this->adminmodel->check_id($sesiUser);
                    $tes2=$this->adminmodel->check_password($sesiPassword);

                    if($tes1&&$tes2)
                    {
                        $data['username']= $this->session->userdata('username');
                        $data['password']= $this->session->userdata('password');
                        redirect('admin/homeListCountry');
                    }
                    else
                    {
                        redirect('admin/homeListCountry');
                    }
                }
                
                else
                {
                    redirect('admin/homeLogin');
                }
	}
    public function sesiAdmin()
    {
         $this->load->library('session');
        $ket['username'] = $this->session->userdata('username'); 
        return $ket;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////// main menu
	
        public function homeListCountry()
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $this->load->model('adminmodel');
            $data['detail']['negara']=$this->negaramodel->getAllNegara('idNegara');
            $data['detail']['admin']=$this->adminmodel->getAllAdmin('idAdmin');
            $this->load->view('viewListNegara',$data);
        }
        public function homeAddCountry($sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $data['detail']['sukses']=$sukses;
            $this->load->view('viewAddNegara',$data);
        }
         public function homeUpdateCountry($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $data['detail']['negara']=$this->negaramodel->getNegara($id);
            $data['detail']['sukses']=$sukses;
            $data['detail']['idharga']=$id;
            $this->load->view('viewUpdateNegara',$data);
        }
        public function homeListPrice()
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
             $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getAllNegara('idNegara');
            $data['detail']['list']=$this->detailmodel->getAllDetail('idNegara');
            $this->load->view('viewListHarga',$data);
        }
        public function homeDetailPrice($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getNegara($id);
            $data['detail']['list']=$this->detailmodel->read($id);
            $data['detail']['sukses']=$sukses;
            $data['detail']['idharga']=$id;
            $this->load->view('viewDetailHarga',$data);
        }
         public function homeUpdatePrice($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getNegara($id);
            $data['detail']['list']=$this->detailmodel->read($id);
            $data['detail']['sukses']=$sukses;
            $data['detail']['idharga']=$id;
            $this->load->view('viewUpdateHarga',$data);
        }
         public function homeAddPrice($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $data['detail']['sukses']=$sukses;
            $data['detail']['id']=$id;
            $this->load->view('viewAddHarga',$data);
        }
         public function homeListMap()
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
             $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getAllNegara('idNegara');
            $data['detail']['list']=$this->detailmodel->getAllDetail('idNegara');
            $this->load->view('viewListLocation',$data);
        }
         public function homeUpdateMap($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getNegara($id);
            $data['detail']['list']=$this->detailmodel->read($id);
            $data['detail']['sukses']=$sukses;
            $data['detail']['id']=$id;
            $data2= $this->viewMapEdit($data);
            $data['detail']['mapedit']=$data2;
            $this->load->view('viewUpdateMap',$data);
        }
        public function homeDaftarMap($sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $this->load->model('negaramodel');
            $this->load->model('detailmodel');
            $data['detail']['negara']=$this->negaramodel->getAllNegara('idNegara');
            $data['detail']['list']=$this->detailmodel->getAllDetail('idNegara');
            $data['detail']['sukses']=$sukses;
            $data2= $this->viewMapEdit($data);
            $data['detail']['mapedit']=$data2;
            $this->load->view('viewListMap',$data);
        }
        public function homeAddMap($id,$sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $data['detail']['sukses']=$sukses;
            $data['detail']['id']=$id;
            $data['detail']['map']=$this->viewMap();
            $this->load->view('viewAddMap',$data);
        }
        public function homeUpdatePassword($sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $data['detail']['sukses']=$sukses;
            $this->load->view('viewUpdatePassword',$data);
        }
         public function homeUpdateUsername($sukses=0)
        {
            $data['detail']=$this->sesiAdmin();
            $data['detail']['sukses']=$sukses;
            $this->load->view('viewUpdateUsername',$data);
        }
       
/////////////////////////////////////////////////////////////////////////////////////////////////////////////// proses data
        public function AddCountry()
        {
            
            $config['upload_path'] =  './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload("bendera"))
            {
                $sukses= 3;
                $this->homeAddCountry($sukses);
            }
            else
            {
               
                $datas['nama']=$this->input->post('negara');
                $datas['bahasa']=$this->input->post('bahasa');
                $datas['ibukota']=$this->input->post('ibukota');
                $datas['luas']=$this->input->post('luas');
                $datas['kepadatan']=$this->input->post('kepadatan');
                $datas['matauang']=$this->input->post('matauang');
                $dataup = $this->upload->data();
                $datas['bendera']=$dataup['orig_name'];
                $datas['tglEdit']=date("Y-m-d H:i:s");
               

                $this->load->model('negaramodel');
                if($this->negaramodel->addNegara($datas))
                {   
                    $sukses=2;
                    $this->homeAddCountry($sukses);
                }else
                {
                    $sukses=1;
                    $this->homeAddCountry($sukses);
                }
            }
        }

         public function UpdateCountry()
        {
            
            $config['upload_path'] =  './upload/';
            $config['allowed_types'] = 'gif|jpg|png';
          
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $id=$this->input->post('id');
                       
            $this->load->library('upload', $config);
            $dataup = $this->upload->data();
            $dataGambar=$dataup['orig_name'];

            $dataGambarOri=$this->input->post('flags');
            if (isset($dataGambar))
            {
                
                
                $this->upload->do_upload("bendera");
                $dataup = $this->upload->data();
                $dataGambar=$dataup['orig_name'];
                $datas['bendera']=$dataGambar;
                $datas['nama']=$this->input->post('negara');
                $datas['bahasa']=$this->input->post('bahasa');
                $datas['ibukota']=$this->input->post('ibukota');
                $datas['luas']=$this->input->post('luas');
                $datas['kepadatan']=$this->input->post('kepadatan');
                $datas['matauang']=$this->input->post('matauang');
                $datas['tglEdit']=date("Y-m-d H:i:s");
                

                $this->load->model('negaramodel');
                $this->negaramodel->deleteGambar($id);
                if($this->negaramodel->updateNegara($id,$datas))
                {   
                    $sukses=2;
                    $this->homeUpdateCountry($id,$sukses);
                }else
                {
                    $sukses=1;
                    $this->homeUpdateCountry($id,$sukses);
                }
                
            }
            else{
                $datas['bendera']=$dataGambarOri;
                $datas['nama']=$this->input->post('negara');
                $datas['bahasa']=$this->input->post('bahasa');
                $datas['ibukota']=$this->input->post('ibukota');
                $datas['luas']=$this->input->post('luas');
                $datas['kepadatan']=$this->input->post('kepadatan');
                $datas['matauang']=$this->input->post('matauang');
                $datas['tglEdit']=date("Y-m-d H:i:s");
                

                $this->load->model('negaramodel');
                if($this->negaramodel->updateNegara($id,$datas))
                {   
                    $sukses=2;
                    $this->homeUpdateCountry($id,$sukses);
                }else
                {
                    $sukses=1;
                    $this->homeUpdateCountry($id,$sukses);
                }
            }
            
        }
        public function UpdatePrice()
        {
            $data['makan']=$this->input->post('makan');
            $data['transKereta']=$this->input->post('kereta');
            $data['transPribadi']=$this->input->post('car');
            $data['transTaxi']=$this->input->post('taxi');
            $data['transBus']=$this->input->post('bus');
            $data['hotel']=$this->input->post('hotel');
            $data['apartment']=$this->input->post('apartment');
            $data['home']=$this->input->post('home');
            $data['listrik']=$this->input->post('listrik');
            $data['air']=$this->input->post('air');
            $data['airminum']=$this->input->post('minum');
            $data['gas']=$this->input->post('gas');
            $data['laundry']=$this->input->post('laundry');
            $id=$this->input->post('id');

            $this->load->model('hargamodel');
            if ($this->hargamodel->updateharga($id,$data))
            {
                $sukses=2;
                $this->homeUpdatePrice($id,$sukses);
            }else
            {
                $sukses=1;
                $this->homeUpdatePrice($id,$sukses);
            }


        }

        public function AddPrice()
        {
            $data['makan']=$this->input->post('makan');
            $data['transKereta']=$this->input->post('kereta');
            $data['transPribadi']=$this->input->post('car');
            $data['transTaxi']=$this->input->post('taxi');
            $data['transBus']=$this->input->post('bus');
            $data['hotel']=$this->input->post('hotel');
            $data['apartment']=$this->input->post('apartment');
            $data['home']=$this->input->post('home');
            $data['listrik']=$this->input->post('listrik');
            $data['air']=$this->input->post('air');
            $data['airminum']=$this->input->post('minum');
            $data['gas']=$this->input->post('gas');
            $data['laundry']=$this->input->post('laundry');
            $data['idNegara']=$this->input->post('id');

            $this->load->model('hargamodel');
            if ($this->hargamodel->addHarga($data))
            {
                $sukses=2;
                $this->homeUpdatePrice( $data['idNegara'],$sukses);
            }else
            {
                $sukses=1;
                $this->homeUpdatePrice( $data['idNegara'],$sukses);
            }


        }
        public function AddLocation()
        {
            $data['lat']=$this->input->post('lat');
            $data['long']=$this->input->post('long');
            $data['idNegara']=$this->input->post('id');
            $this->load->model('mapmodel');
            if ($this->mapmodel->addMap($data))
            {
                $sukses=2;
                //$this->homeUpdateMap($data['idNegara'],$sukses);
                redirect('admin/homeListMap');
            }
            else
            {
                $sukses=1;
                //$this->homeUpdateMap($data['idNegara'],$sukses);
                redirect('admin/homeListMap');
            } 
        }
         public function UpdateLocation()
        {
            $data['lat']=$this->input->post('lat');
            $data['long']=$this->input->post('long');
            $id=$this->input->post('id');
            $this->load->model('mapmodel');
            if ($this->mapmodel->updateMap($id,$data))
            {
                $sukses=2;
                $this->homeUpdateMap($id,$sukses);
            }
            else
            {
                $sukses=1;
                $this->homeUpdateMap($id,$sukses);
            } 
        }
        public function DeleteCountry($id)
        {
            $this->load->model('negaramodel');
            $this->negaramodel->delete($id);
             redirect('admin/homeListCountry');
        }
        public function UpdatePassword()
        {
            $pascur=$this->input->post('curpas');
            $pasnew=$this->input->post('newpas');
            $konfpasnew=$this->input->post('konfnewpas');
            $username=$this->input->post('user');
            $this->load->model('adminmodel');

            if ($pasnew!=$konfpasnew)
            {
                $sukses=5;
                $this->homeUpdatePassword($sukses);
            }
            else
            {
                if($this->adminmodel->update($username,$pascur,$pasnew))
                {
                    $sukses=4;
                     $this->homeUpdatePassword($sukses);
                }
                else
                {
                     $sukses=3;
                     $this->homeUpdatePassword($sukses);
                }
            }

           
        }
        public function UpdateUsername()
        {
            $useredit=$this->input->post('useredit');
            $password=$this->input->post('password');
            $username=$this->input->post('user');
            $this->load->model('adminmodel');
            if ($this->adminmodel->updateuser($username,$useredit,$password))
            {
                 $sukses=4;
                 redirect('admin/homeLogout');
            }
            else
            {
                $sukses=3;
                $this->homeUpdateUsername($sukses);
            }
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////// proses map
        public function viewMapEdit($data)
        {
        //MAP
            $this->load->library('googlemaps');
         
            $icon= base_url().'/assets/metrostyle/img/maps/m3.png';
            $config['center'] = '-7.956008900734134 ,112.61593421592124';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);
            //$jum=sizeof($data['detail'][$i]);

             foreach ($data['detail']['negara']->result() as $key){
                    if ($data['detail']['list']['data1'][$key->idNegara]['harga']!=null)
					{
                    $marker = array();
                    
                    $marker['position'] = $data['detail']['list']['data1'][$key->idNegara]['map']['lat'].','. $data['detail']['list']['data1'][$key->idNegara]['map']['long'];
                    $marker['draggable'] = true;
                            $str="<h2>".$data['detail']['list']['data1'][$key->idNegara]['negara']['nama']."</h2>";
                    $marker['infowindow_content'] = $str;
                    $marker['ondragstart'] = 'getLangLatStart(event.latLng.lat(), event.latLng.lng());';
                    $marker['ondragend'] = 'getLangLat(event.latLng.lat(), event.latLng.lng());';
                    
                    $marker['icon'] = $icon;                
                     
                    $this->googlemaps->add_marker($marker);
					}
            }
            $data['map']=$this->googlemaps->create_map();
            return $data;
            //ENDMAP
        }
        
        public function viewMap()
        {
        //MAP
            $this->load->library('googlemaps');
         
            $icon= base_url().'/assets/metrostyle/img/maps/m3.png';
            $config['center'] = '-7.956008900734134 ,112.61593421592124';
            $config['zoom'] = 'auto';
            $this->googlemaps->initialize($config);
            //$jum=sizeof($data['detail'][$i]);
         
                    
                    $marker = array();
                    $marker['position'] = '-7.956008900734134 ,112.61593421592124';
                    $marker['draggable'] = true;
                           
                    $marker['infowindow_content'] = "<h2>".'Target Location'."</h2>";
                    $marker['ondragstart'] = 'getLangLatStart(event.latLng.lat(), event.latLng.lng());';
                    $marker['ondragend'] = 'getLangLat(event.latLng.lat(), event.latLng.lng());';
                    
                    $marker['icon'] = $icon;                
                     
                    $this->googlemaps->add_marker($marker);
            
            $data['map']=$this->googlemaps->create_map();
            return $data;
            //ENDMAP
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////// login
       public function cekLogin()
        {
            $this->load->model('adminmodel');
            $this->load->library('session');

            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data['username']=$username;
            $data['password']=$password;


            $this->session->set_userdata($data);
     

            if($this->adminmodel->login($username,$password))
                {
                redirect('admin/homeListCountry');
                }
                else
                {
                  redirect('admin/homeLogin');
                }
            
        }
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ tampilan Login
        public function homeLogin()
        {
            //$this->load->view('headerLogin');
            $this->load->view('indexLogin');
        }
        public function homeLogout()
        {
            $this->load->library('session');
            $this->session->sess_destroy();
            redirect('admin/homeLogin');
        }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////// return JSON
        public function jsonListNegara()          
        {                 
          $this->load->model('detailmodel');
          $data['detail']=$this->detailmodel->getAllDetailJson('idNegara');
          if (!$data['detail']) show_404();
           $this->load->view('returnJsonDetailNegara', $data);
        }
        public function jsonListNegaraMin()          
        {                 
          $this->load->model('detailmodel');
          $data['detail']=$this->detailmodel->getAllDetailJsonMin('idNegara');
          if (!$data['detail']) show_404();
           $this->load->view('returnJsonDetailNegaraMin', $data);
        }
        public function jsonOnlyNegara($id)          
        {                 
          $this->load->model('detailmodel');
          $data['detail']=$this->detailmodel->readJson($id);
          $this->load->view('returnJsonNegaraOnly', $data);
        }
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */