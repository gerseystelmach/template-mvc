# SIMPLE MVC - SUPPORT

## Introduction

Le but de ce support est de s'habituer au fonctionnement du simple mvc.

## Avant de commencer : la BDD

Créé une database qui contient une table *"pet"* (= animal de compagnie) avec 3 champs :

* id
* name
* species (cat 🐱 or dog 🐶)

Ajoute quelques valeurs dans cette table.

> Note : n'oublie pas de configurer ton db.php avec tes informations de connexion à ton serveur MySQL ❗.

## Première étape : le contrôleur

Pour que ton site soit utilisable, tu vas vouloir créér des routes qui vont permettre à l'utilisateur d'intéragir avec tes *pets*. Avec le Simple MVC, les routes sont dépendantes des contrôleurs. Ainsi, si tu veux lister tes animaux de compagnie sur une page spécifique, c'est sûrement que tu devras créer un **PetController** avec une méthode **index**. Tu auras donc forcément une route ```/pet/index```, gérée automatiquement par le routeur.

Sans te soucier des requêtes en base de données, ni même des vues, créé donc un **PetController** qui hérite d'**AbstractController**, avec une seule méthode nommée **index**, qui va renvoyer une chaîne de caractère quelconque (comme *"bibi"*, ou *"ma formatrice c'est la meilleure"* par exemple 🙃).

Ensuite, allume ton serveur PHP, ouvre ton navigateur, et va à l'adresse ```localhost:8000/pet/index```. Si "bibi" (ou la chaîne de caractère que tu as choisie) s'affiche, c'est bon pour la suite! 👍

> Note : tu peux prendre exemple sur le **ItemController**

## Deuxième étape : la vue

C'est bien beau un contrôleur comme ça, mais on aimerait quand même qu'il nous renvoie une vue, et pas juste "bibi"... 🤔

Dans le dossier ```View```, créé donc un dossier ```Pet```, dans lequel tu vas ajouter un fichier ```index.html.twig```.

Ce fichier est une vue Twig, qui va hériter de ```layout.html.twig```. La première chose à faire est donc de rajouter un ```extends``` au tout début de ce fichier. Ajoute ensuite un ```block content``` dans lequel tu peux ajouter uniquement un simple ```h1``` contenant le titre de ton choix (comme *"My Pets"*). On verra plus tard pour ajouter d'autres choses à cette vue.

Ta vue est prête, il faut maintenant retourner dans ton contrôleur et dire à ta méthode **index** de compiler et retourner la vue Twig que tu as créée.

Une fois que tu as fait ça, on peut passer à la suite! 👍

> Note : pour compiler une vue twig avec le Simple MVC, la syntaxe est ```$this->twig->render('Folder/file.html.twig')```

## Troisième étape : le modèle

Ok! On a bien un contrôleur qui renvoie une vue, on est pas mal! Mais maintenant, ça pourrait être cool d'aller chercher tous mes animaux de compagnie dans ma base de données, et d'en afficher les informations dans ma vue, non? Et bien faisons cela! 😎

Tu as une table *"pet"* dans ta base de données, tu vas donc avoir besoin d'un **PetManager** qui va servir à faire des requêtes vers cette table. À toi de le créer!

Tu te rends compte qu'il y a déjà un **AbstractManager** qui possède déjà un quelques méthodes. Sympa, le ```SELECT *``` dont on a besoin pour récupérer tous nos animaux de compagnie est déjà défini ici! Du coup, il suffit que ton **PetManager** hérite d'**AbstractManager** et que tu définisses bien sa table en constante de classe, et le tour est joué! 👍

> Note : inspire toi du **ItemManager**

## Quatrième étape : envoyer les données dans la vue

On approche de la fin! Il ne nous reste plus qu'à envoyer nos données dans notre vue.

Pour cela, il faut déjà que l'on dise à notre contrôleur qu'on aura besoin d'utiliser le **PetManager**. Pour cela, il faut d'abord que tu ajoute un ```use``` dans ton **PetController** avec le nom complètement qualifié de ta classe **PetManager** (à toi de le retrouver!).

Ensuite, dans ta méthode index, tu peux instancier un nouveau PetManager, et lui appliquer la méthode ```selectAll()``` pour récupérer tous tes animaux de compagnie dans ta base de donnée, et stocker le tableau résultant de cette requête dans une variable commodément nommée ```$pets```, par exemple.

Enfin, pour injecter tes animaux dans ta vue (ça paraît violent dit comme ça mais pas d'inquiétude, tout va bien se passer 👌), il faut que tu ajoute un deuxième argument à ta méthode ```render()```, sous la forme d'un tableau associatif. Ce tableau prend la forme suivante :
```
[
    'nomDeLaVariableDansTwig' => $laVariableÀInjecter,
    'var2' => $var2,
    'var3' => $var3,
    ...
]
```
Ici, ce tableau n'aura qu'une ligne, puisque la seule variable que nous voulons injecter est notre tableau ```$pets```.

Une fois que tu as bien ajouté ce qu'il faut dans l'appel de la méthode ```render()```, tu devrais avoir accès à ```$pets``` dans ta vue, sous le nom que tu lui a donné pour twig (donc très probablement ```pets``` 🙃).

Tu peux donc faire un simple dump dans twig pour vérifier que tu récupères bien tes animaux du côté de la vue. Si tu récupères bien tous tes animaux, c'est bon! Plus qu'à mettre en page à ta sauce pour afficher les informations de chacun de tes animaux de compagnie trop mignons! 🐈

> Note : pour faire un dump de ```pets``` dans Twig :
```twig
{{ dump(pets) }}
```

## Conclusion

Et voilà, maintenant qu'on a vu le fonctionnement de base du Simple MVC, à toi de jouer pour nous créer une super application pour ton projet 2! 😉
