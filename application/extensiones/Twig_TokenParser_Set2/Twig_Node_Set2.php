<?php

/**
 * Defines a variable.
 *
 * <pre>
 *  {% set2 foo = 'foo' %}
 *
 *  {% set2 foo = [1, 2] %}
 *
 *  {% set2 foo = {'foo': 'bar'} %}
 *
 *  {% set2 foo = 'foo' ~ 'bar' %}
 *
 *  {% set2 foo, bar = 'foo', 'bar' %}
 *
 *  {% set2 foo %}Some content{% endset2 %}
 * </pre>
 */
class Twig_TokenParser_Set2 extends Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param Twig_Token $token A Twig_Token instance
     *
     * @return Twig_NodeInterface A Twig_NodeInterface instance
     */
    public function parse(Twig_Token $token)
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();
        $names = $this->parser->getExpressionParser()->parseAssignmentExpression();
		
        $capture = false;
        if ($stream->test(Twig_Token::OPERATOR_TYPE, '=')) {
            $stream->next();
            $values = $this->parser->getExpressionParser()->parseMultitargetExpression();
print_r($values); die();
            $stream->expect(Twig_Token::BLOCK_END_TYPE);

            if (count($names) !== count($values)) {
                throw new Twig_Error_Syntax("When using set, you must have the same number of variables and assignements.", $lineno);
            }
        } else {
            $capture = true;

            if (count($names) > 1) {
                throw new Twig_Error_Syntax("When using set with a block, you cannot have a multi-target.", $lineno);
            }

            $stream->expect(Twig_Token::BLOCK_END_TYPE);

            $values = $this->parser->subparse(array($this, 'decideBlockEnd'), true);
            $stream->expect(Twig_Token::BLOCK_END_TYPE);
        }

        return new Twig_Node_Set($capture, $names, $values, $lineno, $this->getTag());
    }

    public function decideBlockEnd(Twig_Token $token)
    {
        return $token->test('endset2');
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'set2';
    }
}
