<?php

/**
 * Service de détection et blocage du spam
 */
class AntiSpamService
{
    private $bdd;
    private $spamDictionary;
    private $scoreThreshold = 1; // Score à partir duquel on bloque

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
        // Charge le dictionnaire de mots interdits
        $this->spamDictionary = require dirname(__DIR__, 3) . '/private/config/spamDictionary.php';
    }

    /**
     * Analyse le contenu et calcule un score de spam
     * 
     * @param string $name Nom de l'expéditeur
     * @param string $email Email de l'expéditeur
     * @param string $subject Sujet du message
     * @param string $message Corps du message
     * @return array ['isSpam' => bool, 'score' => int, 'reasons' => array]
     */
    public function analyzeContent($name, $email, $subject, $message)
    {
        $score = 0;
        $reasons = [];

        // Combine tout le contenu pour l'analyse
        $fullContent = strtolower($name . ' ' . $email . ' ' . $subject . ' ' . $message);

        // 1. Vérification du dictionnaire de mots interdits
        foreach ($this->spamDictionary as $spamWord) {
            if (strpos($fullContent, strtolower($spamWord)) !== false) {
                $score += 2;
                $reasons[] = "Mot interdit détecté : " . $spamWord;
            }
        }

        return [
            'isSpam' => $score >= $this->scoreThreshold,
            'score' => $score,
            'reasons' => $reasons
        ];
    }
}
