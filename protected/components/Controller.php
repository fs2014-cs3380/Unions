<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public $navbar;

    public function setNavbar(){
        $this->navbar = array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Home', 'url' => $this->createUrl('/')),
                    array('label' => 'Buildings', 'url' => Yii::app()->baseUrl . '/babbage/buildings/buildings_main.php'),
                    array('label' => 'Reserve a Space', 'url' => Yii::app()->baseUrl . '/babbage/reservearoom/reservearoom.php'),
                    array('label' => 'Lost & Found', 'url' => Yii::app()->baseUrl . '/lostandfound/'),
                    array('label' => 'Policies', 'url' => '#', 'items' => array(
                        array('label' => 'View All', 'url' => $this->createUrl('policies')),
                        array('label' => 'Admin', 'url' => $this->createUrl('policy/admin'), 'visible' => !Yii::app()->user->isGuest),
                        '--',
                        array('label' => 'Presentation View', 'url' => Yii::app()->baseUrl . '/babbage/policies/'),
                        array('label' => 'Presentation View', 'url' => Yii::app()->baseUrl . '/babbage/policies/admin/', 'visible' => !Yii::app()->user->isGuest)
                    )),
                    array('label' => 'Portal', 'url' => '#', 'items' => array(
                        array('label' => 'Group Name Change', 'url' => $this->createUrl('groupNameChange/create')),
                    )),

                ),

            ),
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                ),
            )
        );
    }

}