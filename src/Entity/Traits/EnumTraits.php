<?php

namespace App\Entity\Traits;

trait EnumTraits
{
    /**
     * Convertit une liste de cas d'énumération en tableau de valeurs.
     *
     * @param array $enumCases Les cas de l'énumération.
     * @return array Les valeurs des cas d'énumération.
     */
    public static function enumToArray(array $enumCases): array
    {
        return array_map(fn($case) => $case->value, $enumCases);
    }

    /**
     * Vérifie si une valeur donnée est valide pour une énumération.
     *
     * @param string $value La valeur à vérifier.
     * @param string $enumClass Le nom complet de la classe d'énumération.
     * @return bool Vrai si la valeur est valide, faux sinon.
     */
    public static function isValidEnumValue(string $value, string $enumClass): bool
    {
        return in_array($value, array_map(fn($case) => $case->value, $enumClass::cases()), true);
    }
}