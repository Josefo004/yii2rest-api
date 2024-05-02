<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Productos".
 *
 * @property int $IdProducto
 * @property string $NombreProducto
 * @property string|null $Descripcion
 * @property string|null $Imagen
 * @property float|null $Precio
 * @property float $PrecioPreventa
 * @property float $PrecioReserva
 * @property int $Publicado
 * @property string|null $FechaHoraRegistro
 * @property string|null $FechaHoraActualizacion
 * @property string|null $CodigoUsuarioCreacion
 * @property string|null $CodigoUsuarioActualizacion
 * @property int $IdCategoriaGenero
 * @property string $CodigoEstado
 * @property int $IdCategoriaProducto
 * @property string|null $CodigoProducto
 * @property string|null $FechaCaducidadPreVenta
 * @property string|null $FechaCaducidadReserva
 *
 * @property Estados $codigoEstado
 * @property Usuarios $codigoUsuarioActualizacion
 * @property Usuarios $codigoUsuarioCreacion
 * @property DetalleOrdenes[] $detalleOrdenes
 * @property CategoriaGeneros $idCategoriaGenero
 * @property CategoriaProductos $idCategoriaProducto
 * @property ProductoTallas[] $productoTallas
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreProducto', 'PrecioPreventa', 'PrecioReserva', 'Publicado'], 'required'],
            [['Descripcion'], 'string'],
            [['Precio', 'PrecioPreventa', 'PrecioReserva'], 'number'],
            [['Publicado', 'IdCategoriaGenero', 'IdCategoriaProducto'], 'integer'],
            [['FechaHoraRegistro', 'FechaHoraActualizacion', 'FechaCaducidadPreVenta', 'FechaCaducidadReserva'], 'safe'],
            [['NombreProducto'], 'string', 'max' => 255],
            [['Imagen'], 'string', 'max' => 2000],
            [['CodigoUsuarioCreacion', 'CodigoUsuarioActualizacion'], 'string', 'max' => 15],
            [['CodigoEstado'], 'string', 'max' => 1],
            [['CodigoProducto'], 'string', 'max' => 10]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdProducto' => 'Id Producto',
            'NombreProducto' => 'Nombre Producto',
            'Descripcion' => 'Descripcion',
            'Imagen' => 'Imagen',
            'Precio' => 'Precio',
            'PrecioPreventa' => 'Precio Preventa',
            'PrecioReserva' => 'Precio Reserva',
            'Publicado' => 'Publicado',
            'FechaHoraRegistro' => 'Fecha Hora Registro',
            'FechaHoraActualizacion' => 'Fecha Hora Actualizacion',
            'CodigoUsuarioCreacion' => 'Codigo Usuario Creacion',
            'CodigoUsuarioActualizacion' => 'Codigo Usuario Actualizacion',
            'IdCategoriaGenero' => 'Id Categoria Genero',
            'CodigoEstado' => 'Codigo Estado',
            'IdCategoriaProducto' => 'Id Categoria Producto',
            'CodigoProducto' => 'Codigo Producto',
            'FechaCaducidadPreVenta' => 'Fecha Caducidad Pre Venta',
            'FechaCaducidadReserva' => 'Fecha Caducidad Reserva',
        ];
    }

    /**
     * Gets query for [[CodigoEstado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoEstado()
    {
        return $this->hasOne(Estados::class, ['CodigoEstado' => 'CodigoEstado']);
    }

    /**
     * Gets query for [[CodigoUsuarioActualizacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoUsuarioActualizacion()
    {
        return $this->hasOne(Usuarios::class, ['CodigoUsuario' => 'CodigoUsuarioActualizacion']);
    }

    /**
     * Gets query for [[CodigoUsuarioCreacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoUsuarioCreacion()
    {
        return $this->hasOne(Usuarios::class, ['CodigoUsuario' => 'CodigoUsuarioCreacion']);
    }

    /**
     * Gets query for [[DetalleOrdenes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenes()
    {
        return $this->hasMany(DetalleOrdenes::class, ['IdProducto' => 'IdProducto']);
    }

    /**
     * Gets query for [[IdCategoriaGenero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoriaGenero()
    {
        return $this->hasOne(CategoriaGeneros::class, ['IdCategoriaGenero' => 'IdCategoriaGenero']);
    }

    /**
     * Gets query for [[IdCategoriaProducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoriaProducto()
    {
        return $this->hasOne(CategoriaProductos::class, ['IdCategoriaProducto' => 'IdCategoriaProducto']);
    }

    /**
     * Gets query for [[ProductoTallas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductoTallas()
    {
        return $this->hasMany(ProductoTallas::class, ['IdProducto' => 'IdProducto']);
    }
}
