<?php

namespace App\GraphQL\Scalars;

use GraphQL\Type\Definition\ScalarType;

/**
 * Read more about scalars here https://webonyx.github.io/graphql-php/type-definitions/scalars
 */
class ReferenceValue extends ScalarType
{
    /**
     * Serializes an internal value to include in a response.
     *
     * @param mixed $value
     * @return mixed
     */
    public function serialize($value): array
    {
        return $value;
    }

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param array $value
     * @return array
     */
    public function parseValue($value): array
    {
        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * E.g.
     * {
     *   user(email: "user@example.com")
     * }
     *
     * @param \GraphQL\Language\AST\Node $valueNode
     * @param array<string, mixed>|null $variables
     * @return mixed
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        dd($valueNode);
        return $valueNode->value;
    }
}
