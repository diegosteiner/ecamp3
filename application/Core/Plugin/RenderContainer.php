<?php
/*
 * Copyright (C) 2011 Pirmin Mattmann
 *
 * This file is part of eCamp.
 *
 * eCamp is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * eCamp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with eCamp.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Core\Plugin;

use CoreApi\Entity\Event;

class RenderContainer
{
	
	/**
	 * @var RenderEvent
	 */
	private $renderEvent;
	
	private $containerName;
	
	private $renderPluginPrototypes = array();
	
	
	
	public function __construct(RenderEvent $renderEvent, $containerName){
		$this->renderEvent = $renderEvent;
		$this->containerName = $containerName;
		
		$renderEvent->addRenderContainer($this);
	}
	
	/**
	 * @return \Core\Plugin\RenderEvent
	 */
	public function getRenderEvent(){
		return $this->renderEvent;
	}
	
	public function getContainerName(){
		return $this->containerName;
	}
	
	/**
	 * @access private
	 */
	public function addRenderPluginPrototype(RenderPluginPrototype $renderPluginPrototype){
		$this->renderPluginPrototypes[] = $renderPluginPrototype;
	}
	
	public function getRenderPluginPrototypes(){
		return $this->renderPluginPrototypes;
	}
	
	
	
}