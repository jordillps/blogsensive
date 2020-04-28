<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Posts
        //Per buidar la taula Posts
        Post::truncate();
        Role::truncate();
        Permission::truncate();

        $adminRole = Role::create(['name'=> 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name'=> 'Writer', 'display_name' => 'Escritor']);

        $ViewPostsPermission = Permission::create(['name'=>'View Posts', 'display_name' => 'Ver publicaciones']);
        $CreatePostsPermission = Permission::create(['name'=>'Create Posts', 'display_name' => 'Crear publicaciones']);
        $UpdatePostsPermission = Permission::create(['name'=>'Update Posts', 'display_name' => 'Actualizar publicaciones']);
        $DeletePostsPermission = Permission::create(['name'=>'Delete Posts', 'display_name' => 'Borrar publicaciones']);

        $ViewUsersPermission = Permission::create(['name'=>'View Users', 'display_name' => 'Ver Usuarios']);
        $CreateUsersPermission = Permission::create(['name'=>'Create Users', 'display_name' => 'Crear Usuarios']);
        $UpdateUsersPermission = Permission::create(['name'=>'Update Users', 'display_name' => 'Actualizar Usuarios']);
        $DeleteUsersPermission = Permission::create(['name'=>'Delete Users', 'display_name' => 'Borrar Usuarios']);

        $ViewRolesPermission = Permission::create(['name'=>'View Roles', 'display_name' => 'Ver Roles']);
        $CreateRolesPermission = Permission::create(['name'=>'Create Roles', 'display_name' => 'Crear Roles']);
        $UpdateRolesPermission = Permission::create(['name'=>'Update Roles', 'display_name' => 'Actualizar Roles']);
        $DeleteRolesPermission = Permission::create(['name'=>'Delete Roles', 'display_name' => 'Borrar Roles']);

        $ViewPermissions = Permission::create(['name'=>'View Permissions', 'display_name' => 'Ver Permisos']);
        $UpdatePermissions = Permission::create(['name'=>'Update Permissions', 'display_name' => 'Actualizar Permisos']);

        // $post = new Post;
        // $post->title = "The Best Tropical Leaves Images.";
        // $post->url = Str::slug("The Best Tropical Leaves Images.");
        // $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        // $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        // $post->published_at = Carbon::now()->subDays(4);
        // $post->iframe ='<iframe width="560" height="315" src="https://www.youtube.com/embed/PRoHErzVPyU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        // $post->category_id = 1;
        // $post->user_id = 1;
        // $post->save();

        // $post = new Post;
        // $post->title = "The Best Cultural Leaves Images.";
        // $post->url = Str::slug("The Best Cultural Leaves Images.");
        // $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        // $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        // $post->published_at = Carbon::now()->subDays(4);
        // $post->category_id = 1;
        // $post->user_id = 1;
        // $post->save();

        // $post = new Post;
        // $post->title = "The Best Energical Leaves Images.";
        // $post->url = Str::slug("The Best Energical Leaves Images.");
        // $post->excerpt = "Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...";
        // $post->body = "<p>Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua</p>";
        // $post->published_at = Carbon::now()->subMonths(2);
        // $post->category_id = 1;
        // $post->user_id = 2;
        // $post->save();

        //Posts
        $posts = factory(App\Post::class, 10)->create();

        //Categories

        Category::truncate();

        $category = new Category;
        $category->name = "Animals";
        $category->save();

        $category = new Category;
        $category->name = "Plants";
        $category->save();

        $category = new Category;
        $category->name = "Minerals";
        $category->save();

        $category = new Category;
        $category->name = "Travel";
        $category->save();

        $category = new Category;
        $category->name = "Architecture";
        $category->save();

        $category = new Category;
        $category->name = "Culture";
        $category->save();

        //Tags
        Tag::truncate();

        $tag = new Tag;
        $tag->name = "Animals";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Plants";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Minerals";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Travel";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Architecture";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Culture";
        $tag->save();

        //Users
        User::truncate();

        $admin = new User;
        $admin->name = 'Jordi';
        $admin->email = 'jordis@gmail.com';
        //No cal utiltizar bcrypt perque al model hem
        //utilitzat setAttribute password
        $admin->password = 'secret';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Pedro';
        $writer->email = 'pedros@gmail.com';
        //No cal utiltizar bcrypt perque al model hem
        //utilitzat setAttribute password
        $writer->password = 'secret';
        $writer->save();

        $writer->assignRole($writerRole);

    }
}
