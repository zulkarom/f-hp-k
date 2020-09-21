<?php

namespace backend\models;

use Yii;
use common\models\Todo;
use backend\modules\esiap\models\Course;
use backend\modules\esiap\models\Menu as EsiapMenu;
use backend\modules\erpd\models\Stats as ErpdStats;

class Menu
{
	
	
	public static function courseFocus(){
		return EsiapMenu::courseFocus();
	}
	
	public static function programFocus(){
		$program_focus = [];
		if(Yii::$app->controller->id == 'program' and Yii::$app->controller->module->id == 'esiap'){
			switch(Yii::$app->controller->action->id){
				case 'update': case 'report':case 'structure':
				
				$program_id = Yii::$app->getRequest()->getQueryParam('program');
				$program = Program::findOne($program_id);
				$version = $program->developmentVersion;
				$status = $version->status;
				$show = false;
				if($status == 0 and $program->IAmProgramPic()){
					$show = true;
				}
				$program_focus  = [
					'label' => $program->pro_name_short,
					'icon' => 'book',
					'format' => 'html',
					'url' => '#',
					'items' => [
						
				['label' => 'Program Information', 'visible' => $show, 'icon' => 'pencil', 'url' => ['/esiap/program/update', 'program' => $program_id]],
				
				['label' => 'Program PEO', 'visible' => $show, 'icon' => 'pencil', 'url' => ['/esiap/program/peo', 'program' => $program_id]],
				
				['label' => 'Program PLO', 'visible' => $show, 'icon' => 'pencil', 'url' => ['/esiap/program/plo', 'program' => $program_id]],
				
				['label' => 'PEO vs. PLO', 'visible' => $show, 'icon' => 'pencil', 'url' => ['/esiap/program/peo', 'program' => $program_id]],
				
				['label' => 'Program Structure', 'visible' => $show, 'icon' => 'pencil', 'url' => ['/esiap/program/structure', 'program' => $program_id]],
				
				['label' => 'Preview & Submit', 'icon' => 'book', 'url' => ['/esiap/program/report', 'program' => $program_id]],

                 ]
                    ];
				break;
			}
		}
		
		return $program_focus;
	}
	
	public static function adminErpd(){
		$erpd_admin = [
                        'label' => 'e-RPD Admin',
						'visible' => Yii::$app->user->can('erpd-manager'),
                        'icon' => 'list-ul',
                        'url' => '#',
                        'items' => [
						
				
				['label' => 'Summary', 'icon' => 'pie-chart', 'url' => ['/erpd/admin']],
				
				['label' => 'Lecturers', 'icon' => 'user', 'url' => ['/erpd/admin/lecturer']],
				
				['label' => 'Research', 'icon' => 'book', 'url' => ['/erpd/admin/research'],'badge' => ErpdStats::countTotalResearch(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Publication', 'icon' => 'send', 'url' => ['/erpd/admin/publication'], 'badge' => ErpdStats::countTotalPublication(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				
				
				['label' => 'Membership', 'icon' => 'users', 'url' => ['/erpd/admin/membership'], 'badge' => ErpdStats::countTotalMembership(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Award', 'icon' => 'trophy', 'url' => ['/erpd/admin/award'], 'badge' => ErpdStats::countTotalAward(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Consultation', 'icon' => 'microphone', 'url' => ['/erpd/admin/consultation'], 'badge' => ErpdStats::countTotalConsultation(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Knowledge Transfer', 'icon' => 'truck', 'url' => ['/erpd/admin/knowledge-transfer'], 'badge' => ErpdStats::countTotalKtp(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],


                 ]
                    ]
		
		;
		
		return $erpd_admin;
	}
	
	public static function erpd(){
		return [
                        'label' => 'e-RPD Menu',
                        'icon' => 'list-ul',
                        'url' => '#',
                        'items' => [
						
				['label' => 'Summary', 'icon' => 'pie-chart', 'url' => ['/erpd']],
				
				['label' => 'Research', 'icon' => 'book', 'url' => ['/erpd/research'], 'badge' => ErpdStats::countMyResearch(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Publication', 'icon' => 'send', 'url' => ['/erpd/publication'], 'badge' => ErpdStats::countMyPublication(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				
				
				['label' => 'Membership', 'icon' => 'users', 'url' => ['/erpd/membership'], 'badge' => ErpdStats::countMyMembership(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Award', 'icon' => 'trophy', 'url' => ['/erpd/award'], 'badge' => ErpdStats::countMyAward(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Consultation', 'icon' => 'microphone', 'url' => ['/erpd/consultation'], 'badge' => ErpdStats::countMyConsultation(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],
				
				['label' => 'Knowledge Transfer', 'icon' => 'truck', 'url' => ['/erpd/knowledge-transfer'], 'badge' => ErpdStats::countMyKtp(), 
			'badgeOptions' => ['class' => 'label pull-right bg-blue']],


                 ]
                    ]
		
		;
	}
	
	public static function adminEsiap(){
		$esiap_admin = [
                        'label' => 'eSIAP Admin',
                        'icon' => 'mortar-board',
						'visible' => Yii::$app->user->can('esiap-management'),
                        'url' => '#',
                        'items' => [
				['label' => 'My Course(s)', 'icon' => 'user', 'url' => ['/esiap']],
				
				['label' => 'Summary', 'icon' => 'pie-chart', 'url' => ['/esiap/dashboard']],
				
				
				
				['label' => 'Program List', 'icon' => 'book', 'url' => ['/esiap/program-admin']],
				
				['label' => 'Course List', 'icon' => 'book', 'url' => ['/esiap/course-admin']],
				
				['label' => 'Inactive Courses', 'icon' => 'remove', 'url' => ['/esiap/course-admin/inactive']],
				

                 ]
                    ];	
		return $esiap_admin;
	}
	
	public static function website(){
		$website = [
                        'label' => 'Website Menu',
                        'icon' => 'list-ul',
						'visible' => Yii::$app->user->can('website-manager'),
                        'url' => '#',
                        'items' => [
						
				['label' => 'Summary', 'icon' => 'pie-chart', 'url' => ['/website']],
				
				['label' => 'Front Slider', 'icon' => 'pencil', 'url' => ['/website/front-slider']],
				
				['label' => 'Event List', 'icon' => 'list', 'url' => ['/website/event']],
				

                 ]
                    ];
		return $website;
	}
	
	public static function staff(){
		$staff = [
                        'label' => 'Staff Menu',
						'visible' => Yii::$app->user->can('staff-management'),
                        'icon' => 'list-ul',
                        'url' => '#',
                        'items' => [
						
				['label' => 'Summary', 'icon' => 'pie-chart', 'url' => ['/staff']],
				
				//['label' => 'New Staff', 'icon' => 'plus', 'url' => ['/staff/staff/create']],
				
				['label' => 'Staff List', 'icon' => 'user', 'url' => ['/staff/staff']],
				
				['label' => 'Transfered/Quit', 'icon' => 'user', 'url' => ['/staff/staff/inactive']],
				

                 ]
                    ];
		return $staff;
	}
	
	public static function profile(){
		return [
			'label' => 'My Profile',
			'icon' => 'user',
			'url' => '#',
			'items' => [
				
				['label' => 'Update Profile', 'icon' => 'pencil', 'url' => ['/staff/profile'],],
				
				['label' => 'My Education', 'icon' => 'mortar-board', 'url' => ['/staff/profile/education'],],
			
				['label' => 'Change Password', 'icon' => 'lock', 'url' => ['/user-setting/change-password'],],
				
			
				
				
				
				['label' => 'Log Out', 'icon' => 'arrow-left', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>']


			],
		];
	}

}
