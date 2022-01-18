<?php

namespace ABadCafe\PDE;

const CLASS_MAP = [
  'ABadCafe\\PDE\\IDisplay' => '/IDisplay.php',
  'ABadCafe\\PDE\\IRoutine' => '/IRoutine.php',
  'ABadCafe\\PDE\\IParameterisable' => '/IParameterisable.php',
  'ABadCafe\\PDE\\Util\\Vec3F' => '/util/Vec3F.php',
  'ABadCafe\\PDE\\Util\\ISometimesShareable' => '/util/ISometimesShareable.php',
  'ABadCafe\\PDE\\Util\\TAlwaysShareable' => '/util/TAlwaysShareable.php',
  'ABadCafe\\PDE\\Util\\TNeverShareable' => '/util/TNeverShareable.php',
  'ABadCafe\\PDE\\Display\\PlainASCII' => '/display/PlainASCII.php',
  'ABadCafe\\PDE\\Display\\RGBASCIIOverRGB' => '/display/RGBASCIIOverRGB.php',
  'ABadCafe\\PDE\\Display\\DoubleVerticalRGB' => '/display/DoubleVerticalRGB.php',
  'ABadCafe\\PDE\\Display\\Factory' => '/display/Factory.php',
  'ABadCafe\\PDE\\Display\\BasicRGB' => '/display/BasicRGB.php',
  'ABadCafe\\PDE\\Display\\ASCIIOverRGB' => '/display/ASCIIOverRGB.php',
  'ABadCafe\\PDE\\Display\\RGBASCII' => '/display/RGBASCII.php',
  'ABadCafe\\PDE\\Display\\IANSIControl' => '/display/common/IANSIControl.php',
  'ABadCafe\\PDE\\Display\\IPixelled' => '/display/common/IPixelled.php',
  'ABadCafe\\PDE\\Display\\TPixelled' => '/display/common/TPixelled.php',
  'ABadCafe\\PDE\\Display\\IASCIIArt' => '/display/common/IASCIIArt.php',
  'ABadCafe\\PDE\\Display\\BaseAsyncASCIIWithRGB' => '/display/common/BaseAsyncASCIIWithRGB.php',
  'ABadCafe\\PDE\\Display\\TASCIIArt' => '/display/common/TASCIIArt.php',
  'ABadCafe\\PDE\\Display\\Base' => '/display/common/Base.php',
  'ABadCafe\\PDE\\Display\\IAsynchronous' => '/display/common/IAsynchronous.php',
  'ABadCafe\\PDE\\Display\\TInstrumented' => '/display/common/TInstrumented.php',
  'ABadCafe\\PDE\\Display\\TAsynchronous' => '/display/common/TAsynchronous.php',
  'ABadCafe\\PDE\\Display\\ICustomChars' => '/display/common/ICustomChars.php',
  'ABadCafe\\PDE\\Graphics\\Palette' => '/graphics/Palette.php',
  'ABadCafe\\PDE\\Graphics\\Blitter' => '/graphics/Blitter.php',
  'ABadCafe\\PDE\\Graphics\\IDrawMode' => '/graphics/IDrawMode.php',
  'ABadCafe\\PDE\\Graphics\\ImageCache' => '/graphics/ImageCache.php',
  'ABadCafe\\PDE\\Graphics\\IPixelBuffer' => '/graphics/IPixelBuffer.php',
  'ABadCafe\\PDE\\Graphics\\Image' => '/graphics/Image.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\IMode' => '/graphics/blitter_modes/IMode.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\Inverse' => '/graphics/blitter_modes/Inverse.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\CombineMultiply' => '/graphics/blitter_modes/CombineMultiply.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\CombineAnd' => '/graphics/blitter_modes/CombineAnd.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\Base' => '/graphics/blitter_modes/Base.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\CombineXor' => '/graphics/blitter_modes/CombineXor.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\Replace' => '/graphics/blitter_modes/Replace.php',
  'ABadCafe\\PDE\\Graphics\\BlitterModes\\CombineOr' => '/graphics/blitter_modes/CombineOr.php',
  'ABadCafe\\PDE\\Audio\\Note' => '/audio/Note.php',
  'ABadCafe\\PDE\\Audio\\IFactory' => '/audio/IFactory.php',
  'ABadCafe\\PDE\\Audio\\TFactory' => '/audio/TFactory.php',
  'ABadCafe\\PDE\\Audio\\Player' => '/audio/Player.php',
  'ABadCafe\\PDE\\Audio\\IControlCurve' => '/audio/IControlCurve.php',
  'ABadCafe\\PDE\\Audio\\IMachine' => '/audio/IMachine.php',
  'ABadCafe\\PDE\\Audio\\IPCMOutput' => '/audio/IPCMOutput.php',
  'ABadCafe\\PDE\\Audio\\IConfig' => '/audio/IConfig.php',
  'ABadCafe\\PDE\\Audio\\Signal\\TStream' => '/audio/signal/TStream.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IFilter' => '/audio/signal/IFilter.php',
  'ABadCafe\\PDE\\Audio\\Signal\\FixedMixer' => '/audio/signal/FixedMixer.php',
  'ABadCafe\\PDE\\Audio\\Signal\\PacketRelay' => '/audio/signal/PacketRelay.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IStream' => '/audio/signal/IStream.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Modulator' => '/audio/signal/Modulator.php',
  'ABadCafe\\PDE\\Audio\\Signal\\AutoMuteAfter' => '/audio/signal/AutoMuteAfter.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IWaveform' => '/audio/signal/IWaveform.php',
  'ABadCafe\\PDE\\Audio\\Signal\\AutoMuteSilence' => '/audio/signal/AutoMuteSilence.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Packet' => '/audio/signal/Packet.php',
  'ABadCafe\\PDE\\Audio\\Signal\\TPacketIndexAware' => '/audio/signal/Packet.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IOscillator' => '/audio/signal/IOscillator.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IEnvelope' => '/audio/signal/IEnvelope.php',
  'ABadCafe\\PDE\\Audio\\Signal\\IInsert' => '/audio/signal/IInsert.php',
  'ABadCafe\\PDE\\Audio\\Signal\\LevelAdjust' => '/audio/signal/LevelAdjust.php',
  'ABadCafe\\PDE\\Audio\\Signal\\TPacketGeneratorStats' => '/audio/signal/TPacketGeneratorStats.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Insert\\DelayLoop' => '/audio/signal/insert/DelayLoop.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\LFOZeroToOne' => '/audio/signal/oscillator/LFOZeroToOne.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\Factory' => '/audio/signal/oscillator/Factory.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\Base' => '/audio/signal/oscillator/Base.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\LFOOneToZero' => '/audio/signal/oscillator/LFOOneToZero.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\Sound' => '/audio/signal/oscillator/Sound.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Oscillator\\LFO' => '/audio/signal/oscillator/LFO.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Triangle' => '/audio/signal/waveform/Triangle.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Square' => '/audio/signal/waveform/Square.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\AliasedSquare' => '/audio/signal/waveform/AliasedSquare.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\AliasedPulse' => '/audio/signal/waveform/AliasedPulse.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\TriangleHalfRect' => '/audio/signal/waveform/TriangleHalfRect.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\WhiteNoise' => '/audio/signal/waveform/WhiteNoise.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\TAntialiased' => '/audio/signal/waveform/TAntialiased.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Pulse' => '/audio/signal/waveform/Pulse.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\AliasedSaw' => '/audio/signal/waveform/AliasedSaw.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Factory' => '/audio/signal/waveform/Factory.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Flyweight' => '/audio/signal/waveform/Flyweight.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Saw' => '/audio/signal/waveform/Saw.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineHalfRect' => '/audio/signal/waveform/sine/SineHalfRect.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Sine' => '/audio/signal/waveform/sine/Sine.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineCut' => '/audio/signal/waveform/sine/SineCut.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SinePinch' => '/audio/signal/waveform/sine/SinePinch.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineSaw' => '/audio/signal/waveform/sine/SineSaw.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\Pokey' => '/audio/signal/waveform/sine/Pokey.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineSawHard' => '/audio/signal/waveform/sine/SineSawHard.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineFullRect' => '/audio/signal/waveform/sine/SineFullRect.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Waveform\\SineXForm' => '/audio/signal/waveform/sine/SineXForm.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Envelope\\Factory' => '/audio/signal/envelope/Factory.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Envelope\\Base' => '/audio/signal/envelope/Base.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Envelope\\Shape' => '/audio/signal/envelope/Shape.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Envelope\\DecayPulse' => '/audio/signal/envelope/DecayPulse.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Filter\\BandPass' => '/audio/signal/filter/BandPass.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Filter\\LowPass' => '/audio/signal/filter/LowPass.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Filter\\Base' => '/audio/signal/filter/Base.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Filter\\NotchReject' => '/audio/signal/filter/NotchReject.php',
  'ABadCafe\\PDE\\Audio\\Signal\\Filter\\HighPass' => '/audio/signal/filter/HighPass.php',
  'ABadCafe\\PDE\\Audio\\Output\\Sox' => '/audio/output/Sox.php',
  'ABadCafe\\PDE\\Audio\\Output\\Wav' => '/audio/output/Wav.php',
  'ABadCafe\\PDE\\Audio\\Output\\None' => '/audio/output/None.php',
  'ABadCafe\\PDE\\Audio\\Output\\APlay' => '/audio/output/APlay.php',
  'ABadCafe\\PDE\\Audio\\Output\\Piped' => '/audio/output/common/Piped.php',
  'ABadCafe\\PDE\\Audio\\Sequence\\PatternLoader' => '/audio/sequence/PatternLoader.php',
  'ABadCafe\\PDE\\Audio\\Sequence\\Event' => '/audio/sequence/Event.php',
  'ABadCafe\\PDE\\Audio\\Sequence\\Pattern' => '/audio/sequence/Pattern.php',
  'ABadCafe\\PDE\\Audio\\ControlCurve\\Octave' => '/audio/controlcurve/Octave.php',
  'ABadCafe\\PDE\\Audio\\ControlCurve\\Linear' => '/audio/controlcurve/Linear.php',
  'ABadCafe\\PDE\\Audio\\ControlCurve\\Factory' => '/audio/controlcurve/Factory.php',
  'ABadCafe\\PDE\\Audio\\ControlCurve\\Gamma' => '/audio/controlcurve/Gamma.php',
  'ABadCafe\\PDE\\Audio\\ControlCurve\\Flat' => '/audio/controlcurve/Flat.php',
  'ABadCafe\\PDE\\Audio\\Machine\\WhyAYeSID' => '/audio/machine/WhyAYeSID.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TBNaN' => '/audio/machine/TBNaN.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Sequencer' => '/audio/machine/Sequencer.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TwoOpFM' => '/audio/machine/TwoOpFM.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Factory' => '/audio/machine/Factory.php',
  'ABadCafe\\PDE\\Audio\\Machine\\ProPHPet' => '/audio/machine/ProPHPet.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TRNaN' => '/audio/machine/TRNaN.php',
  'ABadCafe\\PDE\\Audio\\Machine\\DeXter' => '/audio/machine/DeXter.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Control\\Automator' => '/audio/machine/control/Automator.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Control\\Switcher' => '/audio/machine/control/Switcher.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Control\\Definition' => '/audio/machine/control/Definition.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Control\\Knob' => '/audio/machine/control/Knob.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Control\\IAutomatable' => '/audio/machine/control/IAutomatable.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueClap' => '/audio/machine/percussion/AnalogueClap.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueHHOpen' => '/audio/machine/percussion/AnalogueHHOpen.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueClave' => '/audio/machine/percussion/AnalogueClave.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueTom' => '/audio/machine/percussion/AnalogueTom.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueHHClosed' => '/audio/machine/percussion/AnalogueHHClosed.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueSnare' => '/audio/machine/percussion/AnalogueSnare.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueKick' => '/audio/machine/percussion/AnalogueKick.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\BandPassNoise' => '/audio/machine/percussion/BandPassNoise.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\IVoice' => '/audio/machine/percussion/IVoice.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Percussion\\AnalogueCowbell' => '/audio/machine/percussion/AnalogueCowbell.php',
  'ABadCafe\\PDE\\Audio\\Machine\\Subtractive\\Voice' => '/audio/machine/subtractive/Voice.php',
  'ABadCafe\\PDE\\Audio\\Machine\\FM\\Operator' => '/audio/machine/fm/Operator.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TAutomated' => '/audio/machine/common/TAutomated.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TControllerless' => '/audio/machine/common/TControllerless.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TSimpleVelocity' => '/audio/machine/common/TSimpleVelocity.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TPolyphonicMachine' => '/audio/machine/common/TPolyphonicMachine.php',
  'ABadCafe\\PDE\\Audio\\Machine\\TMonophonicMachine' => '/audio/machine/common/TMonophonicMachine.php',
  'ABadCafe\\PDE\\Routine\\NoOp' => '/routine/NoOp.php',
  'ABadCafe\\PDE\\Routine\\Factory' => '/routine/Factory.php',
  'ABadCafe\\PDE\\Routine\\SimpleLine' => '/routine/2D/SimpleLine.php',
  'ABadCafe\\PDE\\Routine\\RGBPulse' => '/routine/2D/RGBPulse.php',
  'ABadCafe\\PDE\\Routine\\RGBImage' => '/routine/2D/RGBImage.php',
  'ABadCafe\\PDE\\Routine\\RGBFire' => '/routine/2D/RGBFire.php',
  'ABadCafe\\PDE\\Routine\\TapeLoader' => '/routine/2D/TapeLoader.php',
  'ABadCafe\\PDE\\Routine\\RGBPersistence' => '/routine/2D/RGBPersistence.php',
  'ABadCafe\\PDE\\Routine\\Rotozoom' => '/routine/2D/Rotozoom.php',
  'ABadCafe\\PDE\\Routine\\StaticNoise' => '/routine/2D/StaticNoise.php',
  'ABadCafe\\PDE\\Routine\\Toroid' => '/routine/3D/Toroid.php',
  'ABadCafe\\PDE\\Routine\\Voxel' => '/routine/3D/Voxel.php',
  'ABadCafe\\PDE\\Routine\\Raytrace' => '/routine/3D/Raytrace.php',
  'ABadCafe\\PDE\\Routine\\Tunnel' => '/routine/3D/Tunnel.php',
  'ABadCafe\\PDE\\Routine\\IResourceLoader' => '/routine/common/IResourceLoader.php',
  'ABadCafe\\PDE\\Routine\\TResourceLoader' => '/routine/common/TResourceLoader.php',
  'ABadCafe\\PDE\\Routine\\Base' => '/routine/common/Base.php',
  'ABadCafe\\PDE\\System\\ILoader' => '/system/ILoader.php',
  'ABadCafe\\PDE\\System\\IRateLimiter' => '/system/IRateLimiter.php',
  'ABadCafe\\PDE\\System\\IAsynchronous' => '/system/IAsynchronous.php',
  'ABadCafe\\PDE\\System\\TAsynchronous' => '/system/TAsynchronous.php',
  'ABadCafe\\PDE\\System\\Context' => '/system/Context.php',
  'ABadCafe\\PDE\\System\\RateLimiter\\Adaptive' => '/system/rate_limiter/Adaptive.php',
  'ABadCafe\\PDE\\System\\RateLimiter\\Simple' => '/system/rate_limiter/Simple.php',
  'ABadCafe\\PDE\\System\\Definition\\TDefinition' => '/system/definition/TDefinition.php',
  'ABadCafe\\PDE\\System\\Definition\\Display' => '/system/definition/Display.php',
  'ABadCafe\\PDE\\System\\Definition\\Event' => '/system/definition/Event.php',
  'ABadCafe\\PDE\\System\\Definition\\Routine' => '/system/definition/Routine.php',
  'ABadCafe\\PDE\\System\\Loader\\JSON' => '/system/loader/JSON.php',
];