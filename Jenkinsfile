pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main',
                    url: 'https://github.com/adielle200/naissance-pipeline.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker build -t naissance-app:latest .'
            }
        }

        stage('Stop Old Container') {
            steps {
                sh 'docker stop naissance-app || true'
                sh 'docker rm naissance-app || true'
            }
        }

        stage('Run Container') {
            steps {
                sh 'docker run -d -p 8081:80 --name naissance-app naissance-app:latest'
            }
        }
    }
}
