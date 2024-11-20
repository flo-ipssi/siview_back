## **Présentation du Test Siview Backend**
Ce projet représente la partie backend de l'application, développée avec Laravel. Il interagit avec le frontend et la base de données MySQL pour gérer les dépenses et autres informations.

---

## **Prérequis**
- Docker et Docker Compose doivent être installés sur votre machine.

---

## **Étapes pour Lancer le Backend**

1. **Cloner le Dépôt**
   ```bash
   git clone https://github.com/flo-ipssi/siview_back.git

2. **Démarrer le service avec Docker Compose** Lancez le conteneur avec Docker Compose :
   ```bash
   docker-compose up -d

### **Informations supplémentaires**

1. **Générer les clés d'application Laravel**
   ```bash
   docker exec -it back php artisan key:generate

2. **Migrations de la base de données :**
   ```bash
   docker exec -it back php artisan migrate
   
2. **Accéder au shell du conteneur**
   ```bash
   docker exec -it back bash

4. **Arrêter le service**
   ```bash
   docker-compose down


