<?php
class Language{
	public static
		$language,
		$languages,
		$download,
		$message,
		$send,
		$messages,
		$status,
		$email,
		$password,
		$name,
		$nameDesc,
		$weekdays,
		$register,
		$login,
		$team,
		$games,
		$development,
		$documents,
		$online,
		$search,
		$mainNavigation,
		$realTimeDesc,
		$memberSince,
		$profile,
		$logout,
		$user,
		$userList,
		$newUser,
		$information,
		$location,
		$locationDesc,
		$timezones,
		$timezone,
		$roles,
		$rolesName,
		$worktime,
		$workdays,
		$salary,
		$weeklySalary,
		$perHour,
		$hoursPerDay,
		$avatar,
		$update,
		$delete,
		$home,
		$allWeekdays,
		$monFri,
		$monSat,
		$weekends,
		$requiredFields,
		$projectList,
		$newProject,
		$overview,
		$gameplayMechanics,
		$storyCharacters,
		$areasLevels,
		$interface,
		$technical,
		$gameArt,
		$management,
		$version,
		$versionDesc,
		$genre,
		$overviewDesc,
		$gameplayDesc,
		$storyDesc,
		$areasDesc,
		$interfaceDesc,
		$technicalDesc,
		$artDesc,
		$managementDesc,
		$projectName,
		$teamMembers,
		$projectLead,
		$gameCopyright,
		$gameConcept,
		$gameFeatures,
		$gameGenre,
		$gameAudience,
		$gameLookFeel,
		$gameProgression,
		$gameObjectives,
		$gameFlow,
		$gamePhysics,
		$gameMove,
		$gameCombat,
		$gameEconomy,
		$switchesButtons,
		$pickCarryDrop,
		$gameTalking,
		$gameReading,
		$gameOptions,
		$replaySave,
		$cheatsEasterEggs,
		$gameBackstory,
		$gamePlot,
		$gameLicense,
		$gameScreenFlow,
		$gameHUD,
		$gameRendering,
		$gameCamera,
		$gameLighting,
		$gameControls,
		$gameHelp,
		$gameHardware,
		$gameDevEnv,
		$gameDevStandards,
		$gameEngine,
		$gameNetwork,
		$codeConventions,
		$artStyle,
		$projectBudget,
		$projectMonetization,
		$projectRisks,
		$projectMarketing,
		$projectProduction,
		$projectRelease,
		$cover,
		$banner,
		$noImage,
		$contents,
		$newDocumentSection,
		$newDocumentSectionName,
		$newDocumentSectionCont,
		$newDocumentSectionDesc,
		$documentSectName,
		$documentSectContents,
		$projectNameDesc,
		$gameCopyrightDesc,
		$gameConceptDesc,
		$gameFeaturesDesc,
		$gameGenreDesc,
		$gameAudienceDesc,
		$gameLookFeelDesc,
		$file,
		$create,
		$projectUpdate,
		$memberDetail,
		$createMember,
		$updateMember,
		$audience,
		$gameProgressionDesc,
		$gameObjectivesDesc,
		$gameFlowDesc,
		$gamePhysicsDesc,
		$gameMoveDesc,
		$gameCombatDesc,
		$gameEconomyDesc,
		$switchesButtonsDesc,
		$pickCarryDropDesc,
		$gameTalkingDesc,
		$gameReadingDesc,
		$gameOptionsDesc,
		$replaySaveDesc,
		$cheatsEasterEggsDesc,
		$gameBackstoryDesc,
		$gamePlotDesc,
		$gameLicenseDesc	,
		$gameScreenFlowDesc,
		$gameHUDDesc,
		$gameRenderingDesc,
		$gameCameraDesc,
		$gameLightingDesc,
		$gameControlsDesc,
		$gameHelpDesc,
		$gameHardwareDesc,
		$gameDevEnvDesc,
		$gameDevStandardsDesc,
		$gameEngineDesc,
		$gameNetworkDesc,
		$codeConventionsDesc,
		$artStyleDesc,
		$projectBudgetDesc,
		$projectMonetizationDesc,
		$projectRisksDesc,
		$projectMarketingDesc,
		$projectProductionDesc,
		$projectReleaseDesc,
		$characters,
		$enviromentObjects,
		$cutscenes,
		$dialogs,
		$areas,
		$levels,
		$screens,
		$sounds,
		$music,
		$softwareComponents,
		$graphics,
		$resources,
		$character,
		$enviromentObject,
		$cutscene,
		$dialog,
		$area,
		$level,
		$screen,
		$sound,
		$softwareComponent,
		$graphic,
		$resource,
		$createNew,
		$attributes,
		$stateMachine,
		$backstory,
		$personality,
		$characteristics,
		$abilities,
		$relevance,
		$relationship,
		$statistics,
		$AIType,
		$AICollision,
		$AIPathfinding,
		$charAttDesc,
		$charSMDesc,
		$charBSDesc,
		$CharPersDesc,
		$CharCharDesc,
		$CharAbDesc,
		$CharRelevDesc,
		$CharRelatDesc,
		$CharStatDesc,
		$CharAITypeDesc,
		$CharAIColDesc,
		$CharAIPathDesc,
		$EnvAttDesc,
		$EnvCharDesc,
		$EnvRelevDesc,
		$EnvRelatDesc,
		$EnvStatDesc,
		$description,
		$time,
		$estimatedTime,
		$timeDesc,
		$storyboard,
		$script,
		$storyboardDesc,
		$scriptDesc,
		$connections,
		$connectionsDesc,
		$areaCharDesc,
		$areaDescDesc,
		$synopsis,
		$introduction,
		$design,
		$encounters,
		$path,
		$walkthrough,
		$closing,
		$synopsisDesc,
		$introductionDesc,
		$levelDesc,
		$levelObjDesc,
		$designDesc,
		$encountersDesc,
		$pathDesc,
		$walkthroughDesc,
		$closingDesc,
		$screenDesc,
		$soundDesc,
		$musicDesc,
		$SCRequirements,
		$graphicDesc,
		$sketchTime,
		$finishedTime,
		$sketchTimeDesc,
		$finishedTimeDesc,
		$resourceDesc,
		$units,
		$cost,
		$unitsDesc,
		$costDesc,
		$documentList,
		$documentDetail,
		$taskList,
		$task,
		$action,
		$confirmDelete,
		$filter,
		$taskstodo,
		$noTasks,
		$noTasksMessage,
		$noActivities,
		$noActivitiesMessage,
		$registerWorktime,
		$designDocument,
		$sketch,
		$finalVersion,
		$graphicTimeMessage,
		$soundTimeMessage,
		$musicTimeMessage,
		$componentTimeMessage,
		$cutsceneTimeMessage,
		$levelTimeMessage,
		$screenTimeMessage,
		$dialogTimeMessage,
		$graphicTimeCurrentMessage,
		$soundTimeCurrentMessage,
		$musicTimeCurrentMessage,
		$componentTimeCurrentMessage,
		$cutsceneTimeCurrentMessage,
		$levelTimeCurrentMessage,
		$screenTimeCurrentMessage,
		$dialogTimeCurrentMessage,
		$graphicTimeRealMessage,
		$soundTimeRealMessage,
		$musicTimeRealMessage,
		$componentTimeRealMessage,
		$cutsceneTimeRealMessage,
		$levelTimeRealMessage,
		$screenTimeRealMessage,
		$dialogTimeRealMessage,
		$markAsDone,
		$context,
		$reportBug,
		$trigger,
		$severity,
		$picture,
		$triggerDesc,
		$severityOptions,
		$bugDesc,
		$bugMessage,
		$bug,
		$bugs,
		$markAsFixed,
		$markAsTested,
		$markAsCoded,
		$markAsValid,
		$viewAll,
		$viewFinal,
		$viewFinish,
		$viewSketch,
		$viewPending,
		$viewTest,
		$viewFix,
		$viewDesign,
		$viewCode,
		$viewValid,
		$viewRecord,
		$viewProduce,
		$viewWrite,
		$start,
		$stop,
		$save,
		$states,
		$state,
		$date,
		$timesheets,
		$duplcateEmail,
		$typeMessage,
		$noProjects,
		$noProjectsMessage,
		$noProjectsCreate,
		$noDocuments,
		$noDocumentsMessage,
		$buildTeam,
		$buildTeamDesc,
		$viewTeam,
		$startProject,
		$startProjectDesc,
		$viewProject,
		$workProject,
		$workProjectDesc,
		$viewWork,
		$genDoc,
		$genDocDesc,
		$viewDoc,
		$gddeasy,
		$mainSlogan,
		$signInDesc,
		$forgotPassword,
		$registerMember,
		$rememberMe,
		$haveAccount,
		$repeatPassword,
		$companyName,
		$registerCompany,
		$contextDesc,
		$dialogDesc,
		$gddby,
		$nullPassword,
		$wrongCredentials,
		$price,
		$priceDesc,
		$publicDocument,
		$recover,
		$recoverDesc,
		$recoverEmailTitle,
		$recoverEmailSent,
		$recoverEmail,
		$newPassword,
		$company,
		$payment,
		$from,
		$to,
		$invoice,
		$account,
		$paymentDue,
		$invoiceDate,
		$expirationDate,
		$currency,
		$qty,
		$product,
		$unitPrice,
		$subtotal,
		$tax,
		$total,
		$paymentMethods,
		$paymentMethodsDesc,
		$payWith,
		$print,
		$currencies,
		$address,
		$website,
		$phone,
		$paypalEmail,
		$nextInvoice,
		$slogan,
		$address1,
		$address2,
		$city,
		$country,
		$zip,
		$paymentRequired,
		$completed,
		$noAdminError,
		$error,
		$errorCode,
		$dependencies,
		$dependenciesDesc,
		$noComponent,
		$belongings,
		$belongingsDesc,
		$noCharacter,
		$noObject,
		$noScreen,
		$noLevel,
		$noCutscene,
		$tasks,
		$taskString,
		$edit,
		$priority,
		$currencySymbol,
		$referralLink,
		$referralDesc,
		$passwordMismatch,
		$registerEmailTitle,
		$registerEmail,
		$features,
		$muchMore,
		$pricing,
		$iterariveDesign,
		$backlog,
		$messaging,
		$customization,
		$attachments,
		$referralsProgram,
		$integrations,
		$reports,
		$visibility,
		$share,
		$support,
		$iterariveDesignDesc,
		$backlogDesc,
		$timesheetsDesc,
		$messagingDesc,
		$customizationDesc,
		$attachmentsDesc,
		$referralsProgramDesc,
		$integrationsDesc,
		$reportsDesc,
		$visibilityDesc,
		$shareDesc,
		$supportDesc,
		$emailFooter,
		$deadline,
		$deadlineDesc,
		$changeRequest,
		$changeDesc,
		$changeState,
		$help,
		$editTeam,
		$projectDetail,
		$developmentHelp1,
		$developmentHelp2,
		$developmentHelp3,
		$overviewHelp1,
		$overviewHelp2,
		$userHelp1,
		$userHelp2,
		$resourcesTasks,
		$gddIsFree,
		$validAccountLess,
		$simpleToUse,
		$viewAllGames,
		$validURL,
		$devlog,
		$devlogs,
		$publish,
		$projectHelp1,
		$projectHelp2,
		$projectHelp3,
		$taskHelp1,
		$taskHelp2,
		$taskHelp3,
		$developmentTaskHelp1,
		$developmentTaskHelp2,
		$developmentTaskHelp3,
		$developmentTaskHelp4
		;
}

if (!Yii::app()->user->isGuest){
	$user = User::model()->findByPk(Yii::app()->user->id);
	if ($user){
		Yii::app()->user->setState('roles', explode(',', $user->roles));
		Yii::app()->user->setState('language', $user->language);
		Yii::app()->user->setState('project', $user->active_project_id);
		if ($user->name != ''){
			Yii::app()->user->setState('displayName', $user->name);
		}
		else{
			Yii::app()->user->setState('displayName', $user->email);
		}
	}
	Yii::app()->setLanguage(Yii::app()->user->language);
}
else{
	Yii::app()->setLanguage(LANG);
}


include "languages/" . Yii::app()->language . ".php";
setlocale(LC_MONETARY, 'en_US.UTF-8');
