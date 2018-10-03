<?php

/**
 * MIT License
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace SprykerEco\Yves\ShopUiCompatibility\Twig\TokenParser;

use SprykerEco\Yves\ShopUiCompatibility\Twig\Node\ShopUiCompatibilityDefineTwigNode;
use Twig_Token;
use Twig_TokenParser;

class ShopUiCompatibilityDefineTwigTokenParser extends Twig_TokenParser
{
    /**
     * @return string
     */
    public function getTag(): string
    {
        return 'define';
    }

    /**
     * @param \Twig_Token $token
     *
     * @return \SprykerEco\Yves\ShopUiCompatibility\Twig\Node\ShopUiCompatibilityDefineTwigNode
     */
    public function parse(Twig_Token $token): ShopUiDefineTwigNode
    {
        $parser = $this->parser;
        $stream = $parser->getStream();
        $name = $stream->expect(Twig_Token::NAME_TYPE)->getValue();
        $stream->expect(Twig_Token::OPERATOR_TYPE, '=');
        $value = $parser->getExpressionParser()->parseExpression();
        $line = $token->getLine();
        $tag = $this->getTag();
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new ShopUiCompatibilityDefineTwigNode($name, $value, $line, $tag);
    }
}
