<p align="center"><p align="center"><a href='https://svgshare.com/s/TKW' ><img src='https://svgshare.com/i/TKW.svg' title='TEST' width="400" height="600"></a></p></p>

## About This Laravel Project

This is my test Laravel project for United Skills.

## How to install

If you are a beginner, then follow the instructions to install my project:

1)You must have a local server installed. I am using [OpenServer](https://ospanel.io/download/).

2)You must have [Laravel](https://laravel.com/docs/8.x) installed. It is installed using [Composer](https://getcomposer.org/).

3)Next, you can either download my project directly by clicking the green Code button, then clicking Download ZIP, or download using Git. To download via [Git](https://git-scm.com/), you must have it installed.

4)---If you downloaded the file directly, unpack it in the directory of your local server. I have this folder domains (D:\OpenServer\domains). Then go to step 10.

   ---If you are using git, then change to the same directory using the command line (cd D:\OpenServer\domains).

5)Next, we need to clone the repository. To do this, open the console and write: git clone https://github.com/velikhanov/TestWorkUnitedSkills.git. Wait until everything is installed.

6)Next, go to the directory with the newly installed project (cd D:\OpenServer\domains\TestWorkUnitedSkills).

7)Write in the console: php artisan migrate. Then php artisan storage: link.

8)Initially, I planned to make the functionality of adding and removing categories, but did not have time. And adding a post asks you to select a category. But to solve this go to your DBMS. I have used PhpMyAdmin. To enter it, select the OpenServer checkbox in the tray->Advanced->PhpMyAdmin. Select the import menu item and insert the categories.sql file, which is located in the project folder (database).

9)Now you can run the project with the command in the console: php artisan serve and go to the site at the address specified in the console (usually http://127.0.0.1:8000/).

10)I hope you will like it!

### Social Networks

- **[VK](https://vk.com/velikhanov99)**
- **[Facebook](https://www.facebook.com/velikhanov99)**
- **[Instagram](https://www.instagram.com/velihanov99/)**
