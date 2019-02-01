/* External dependencies */
import { Component, Fragment } from "react";
import PropTypes from "prop-types";
import { InnerBlocks } from "@wordpress/editor";
import { __ } from "@wordpress/i18n";

/* Internal dependencies */
import Title from "../../shared-components/Title";
import { NAME as DESCRIPTION } from "../description";

/**
 * Represents a Question block inside the block editor.
 */
export default class Question extends Component {
	/**
	 * Constructs a Question block component instance.
	 *
	 * @param {Object} props Props for the React component.
	 *
	 * @returns {void}
	 */
	constructor( props ) {
		super( props );

		this.setTitle = this.setTitle.bind( this );
	}

	/**
	 * Sets the title in the attributes to a value.
	 *
	 * @param {string} title The value to set the title to.
	 *
	 * @returns {void}
	 */
	setTitle( title ) {
		this.props.setAttributes( { title } );
	}

	/**
	 * Renders a Question edit inside the block editor.
	 *
	 * @returns {ReactElement} The rendered UI.
	 */
	render() {
		const { attributes } = this.props;

		return <Fragment>
			<Title title={ attributes.title } setTitle={ this.setTitle } placeholder={ __( "Enter a question", "wordpress-seo" ) } />
			<InnerBlocks
				allowedBlocks={ [ DESCRIPTION ] }
				template={ [
					[ DESCRIPTION, {}, [] ],
				] }
				templateLock="all"
			/>
		</Fragment>;
	}

	/**
	 * Renders the content of the Question for the front end.
	 *
	 * @param {Object} attributes The set attributes for this Step.
	 *
	 * @returns {ReactElement} The rendered HTML for the frontend.
	 */
	static Content( { attributes } ) {
		return <Fragment>
			<Title.Content title={ attributes.title } />
			<InnerBlocks.Content />
		</Fragment>;
	}
}

Question.propTypes = {
	attributes: PropTypes.object.isRequired,
	setAttributes: PropTypes.func.isRequired,
};

