<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Login con webservice de bam y ActiveDirectory
     * @param string email
     * @param string password
     * @return string|exception
     */
    public static function loginBam($email, $password){
        try {
            $client = new \nusoap_client(env('WS_BAM_LOGIN'), 'wsdl');
            $result = $client->call('getAccess', [
                'usr' => $email,
                'pass' => $password
            ]);
            return $result[0]['respuesta'];
        } catch (Exception $e) {
            abort(500);
        }
    }

    /**
     * Obtiene los datos del usuario logueado del ActiveDirector
     * @param string user
     * @param string password
     * @return array datos del usuario
     */
    public static function datosBam($user, $password){
        $usuario = trim($user);
        $password = trim($password);
        $dn = "DC=bam, DC=com, DC=mx";
        $filtro = "(&(objectClass=user)(samAccountName=$usuario))";
        $ad = ldap_connect("ldap://10.14.2.20") or abort(500);
        ldap_set_option ($ad, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
        $bd = ldap_bind($ad,"$usuario@bam.com.mx",$password);
        $busqueda=ldap_search($ad, $dn, $filtro);
        $resultados = ldap_get_entries($ad, $busqueda);
        $nombre = $resultados[0]['cn'][0];
        $area = $resultados[0]['description'][0];
        $puesto = $resultados[0]['title'][0];
        return [
            'nombre' => $resultados[0]['cn'][0],
            'subarea' => $resultados[0]['description'][0],
            'puesto' => $resultados[0]['title'][0],
            'area' => $resultados[0]['company'][0]
        ];
    }

     /**
     * @inheritdoc
     */
    public function comentarios(){
        return $this->hasMany('App\Comentarios', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function contactos(){
        return $this->hasMany('App\Contactos', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function direcciones(){
        return $this->hasMany('App\Direcciones', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function empresas(){
        return $this->hasMany('App\Empresas', 'id_user', 'id');
    }

     /**
     * @inheritdoc
     */
    public function estadosProspecto(){
        return $this->hasMany('App\EstadosProspecto', 'id_user', 'id');
    }

     /**
     * @inheritdoc
     */
    public function girosMercantiles(){
        return $this->hasMany('App\GirosMercantiles', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function OrigenProspecto(){
        return $this->hasMany('App\OrigenProspecto', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function prefijos(){
        return $this->hasMany('App\Prefijos', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function productosInteres(){
        return $this->hasMany('App\ProductosInteres', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function prospectos(){
        return $this->hasMany('App\Prospectos', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function tiposEmpresa(){
        return $this->hasMany('App\TiposEmpresa', 'id_user', 'id');
    }

    public function verificaPermiso(){
        $roles = $this->roles;
        $permiso = [];
        foreach ($roles as $key => $value) {
            $model = PermisosRol::where([
                ['rol_id', '=', $value->rol_id]
            ])
            ->get();
            foreach ($model as $key2 => $value2) {
                $permiso[] = $value2->permiso->permiso;
            }
        }
        return $permiso;
    }

    public function hasRol($rol){
        $roles = $this->roles;
        $verifica = [];
        foreach ($roles as $key => $value) {
            if ($value->rol->rol == $rol) {
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function roles(){
        return $this->hasMany('App\RolesUsuario', 'id_user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function rol(){
        return $this->hasOne('App\RolesUsuario', 'id_user', 'id');
    }

}
