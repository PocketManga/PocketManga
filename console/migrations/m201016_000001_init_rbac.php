<?php

use yii\db\Migration;

/**
 * Class m201016_141315_init_rbac
 */
class m201016_000001_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201016_141315_init_rbac cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $auth = Yii::$app->authManager;

        $UserViewPost = $auth->createPermission('UserViewPost');
        $UserViewPost->description = 'Permission to see user info';
        $auth->add($UserViewPost);

        $UserUpdatePost = $auth->createPermission('UserUpdatePost');
        $UserUpdatePost->description = 'Permission to update user status';
        $auth->add($UserUpdatePost);

        $UserCreatePost = $auth->createPermission('UserCreatePost');
        $UserCreatePost->description = 'Permission to create new manager user';
        $auth->add($UserCreatePost);

        $UserDeletePost = $auth->createPermission('UserDeletePost');
        $UserDeletePost->description = 'Permission to delete user';
        $auth->add($UserDeletePost);

        /************************************************************/

        $MangaViewPost = $auth->createPermission('MangaViewPost');
        $MangaViewPost->description = 'Permission to see manga info';
        $auth->add($MangaViewPost);

        $MangaUpdatePost = $auth->createPermission('MangaUpdatePost');
        $MangaUpdatePost->description = 'Permission to update manga';
        $auth->add($MangaUpdatePost);

        $MangaCreatePost = $auth->createPermission('MangaCreatePost');
        $MangaCreatePost->description = 'Permission to create new manga';
        $auth->add($MangaCreatePost);

        $MangaDeletePost = $auth->createPermission('MangaDeletePost');
        $MangaDeletePost->description = 'Permission to delete manga';
        $auth->add($MangaDeletePost);

        /************************************************************/

        $ChapterViewPost = $auth->createPermission('ChapterViewPost');
        $ChapterViewPost->description = 'Permission to see chapter info';
        $auth->add($ChapterViewPost);

        $ChapterUpdatePost = $auth->createPermission('ChapterUpdatePost');
        $ChapterUpdatePost->description = 'Permission to update chapter';
        $auth->add($ChapterUpdatePost);

        $ChapterCreatePost = $auth->createPermission('ChapterCreatePost');
        $ChapterCreatePost->description = 'Permission to create new chapter';
        $auth->add($ChapterCreatePost);

        $ChapterDeletePost = $auth->createPermission('ChapterDeletePost');
        $ChapterDeletePost->description = 'Permission to delete chapter';
        $auth->add($ChapterDeletePost);

        /************************************************************/

        $CommentViewPost = $auth->createPermission('CommentViewPost');
        $CommentViewPost->description = 'Permission to view comment';
        $auth->add($CommentViewPost);

        $CommentUpdatePost = $auth->createPermission('CommentUpdatePost');
        $CommentUpdatePost->description = 'Permission to update comment';
        $auth->add($CommentUpdatePost);

        $CommentCreatePost = $auth->createPermission('CommentCreatePost');
        $CommentCreatePost->description = 'Permission to create new comment';
        $auth->add($CommentCreatePost);

        $CommentDeletePost = $auth->createPermission('CommentDeletePost');
        $CommentDeletePost->description = 'Permission to delete comment';
        $auth->add($CommentDeletePost);

        /************************************************************/

        $ViewPost = $auth->createPermission('ViewPost');
        $ViewPost->description = 'Permission to view';
        $auth->add($ViewPost);

        $UpdatePost = $auth->createPermission('UpdatePost');
        $UpdatePost->description = 'Permission to update';
        $auth->add($UpdatePost);

        $CreatePost = $auth->createPermission('CreatePost');
        $CreatePost->description = 'Permission to create';
        $auth->add($CreatePost);

        $DeletePost = $auth->createPermission('DeletePost');
        $DeletePost->description = 'Permission to delete';
        $auth->add($DeletePost);

        /************************************************************/
        /************************************************************/

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $auth->addChild($admin, $UserViewPost);
        $auth->addChild($admin, $UserUpdatePost);
        $auth->addChild($admin, $UserCreatePost);
        $auth->addChild($admin, $UserDeletePost);

        $auth->addChild($admin, $MangaViewPost);
        $auth->addChild($admin, $MangaUpdatePost);
        $auth->addChild($admin, $MangaCreatePost);
        $auth->addChild($admin, $MangaDeletePost);

        $auth->addChild($admin, $ChapterViewPost);
        $auth->addChild($admin, $ChapterUpdatePost);
        $auth->addChild($admin, $ChapterCreatePost);
        $auth->addChild($admin, $ChapterDeletePost);
        
        $auth->addChild($admin, $CommentViewPost);
        $auth->addChild($admin, $CommentDeletePost);

        $auth->addChild($admin, $ViewPost);
        $auth->addChild($admin, $UpdatePost);
        $auth->addChild($admin, $CreatePost);
        $auth->addChild($admin, $DeletePost);

        /************************************************************/

        $fMangager = $auth->createRole('f_manager');
        $auth->add($fMangager);
        $auth->addChild($fMangager, $UserViewPost);
        $auth->addChild($fMangager, $UserUpdatePost);
        $auth->addChild($fMangager, $UserCreatePost);
        $auth->addChild($fMangager, $UserDeletePost);

        $auth->addChild($fMangager, $MangaViewPost);
        $auth->addChild($fMangager, $MangaUpdatePost);
        $auth->addChild($fMangager, $MangaCreatePost);
        $auth->addChild($fMangager, $MangaDeletePost);

        $auth->addChild($fMangager, $ChapterViewPost);
        $auth->addChild($fMangager, $ChapterUpdatePost);
        $auth->addChild($fMangager, $ChapterCreatePost);
        $auth->addChild($fMangager, $ChapterDeletePost);
        
        $auth->addChild($fMangager, $CommentViewPost);
        $auth->addChild($fMangager, $CommentDeletePost);

        $auth->addChild($fMangager, $ViewPost);
        $auth->addChild($fMangager, $UpdatePost);
        $auth->addChild($fMangager, $CreatePost);
        $auth->addChild($fMangager, $DeletePost);

        /************************************************************/

        $mMangager = $auth->createRole('m_manager');
        $auth->add($mMangager);
        $auth->addChild($mMangager, $UserViewPost);
        $auth->addChild($mMangager, $UserUpdatePost);

        $auth->addChild($mMangager, $MangaViewPost);
        $auth->addChild($mMangager, $MangaUpdatePost);
        $auth->addChild($mMangager, $MangaCreatePost);

        $auth->addChild($mMangager, $ChapterViewPost);
        $auth->addChild($mMangager, $ChapterUpdatePost);
        $auth->addChild($mMangager, $ChapterCreatePost);
        
        $auth->addChild($mMangager, $CommentViewPost);

        $auth->addChild($mMangager, $ViewPost);
        $auth->addChild($mMangager, $CreatePost);

        /************************************************************/

        $lMangager = $auth->createRole('l_manager');
        $auth->add($lMangager);
        $auth->addChild($lMangager, $UserViewPost);
        $auth->addChild($lMangager, $UserUpdatePost);
        
        $auth->addChild($lMangager, $MangaViewPost);

        $auth->addChild($lMangager, $ChapterViewPost);
        $auth->addChild($lMangager, $ChapterCreatePost);
        
        $auth->addChild($lMangager, $CommentViewPost);

        $auth->addChild($lMangager, $ViewPost);

        /************************************************************/

        $leitor = $auth->createRole('leitor');
        $auth->add($leitor);
        $auth->addChild($leitor, $UserViewPost);
        $auth->addChild($leitor, $UserUpdatePost);
        
        $auth->addChild($leitor, $CommentViewPost);
        $auth->addChild($leitor, $CommentUpdatePost);
        $auth->addChild($leitor, $CommentCreatePost);
        $auth->addChild($leitor, $CommentDeletePost);

        /************************************************************/
        /************************************************************/

        $auth->assign($admin, 1);
        $auth->assign($leitor, 1);
    }
    
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
